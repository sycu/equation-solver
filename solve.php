<?php

//set_error_handler(fn () => null,  E_WARNING);

class EquationSolver
{
    public function solve(string $equation, bool $unique = false): Generator
    {
        preg_match_all('/[A-Za-z]/', $equation, $output);

        yield from $this->doSolve($equation, [], array_unique($output[0]), $unique);
    }

    private function doSolve(string $equation, array $given, array $unknown, bool $unique): Generator
    {
        if (!$unknown) {
            try {
                if (eval(sprintf('return %s;', $solution = strtr($equation, $given)))) {
                    yield $solution;
                }
            } catch (ParseError) {
            }

            return;
        }

        $variable = array_shift($unknown);
        for ($i = 0; $i <= 9; $i++) {
            if (!$unique || !in_array($i, $given)) {
                yield from $this->doSolve($equation, [$variable => $i] + $given, $unknown, $unique);
            }
        }
    }
}

$solver = new EquationSolver();
foreach ($solver->solve($argv[1] ?? '', (bool) ($argv[2] ?? false)) as $result) {
    echo($result . PHP_EOL);
}
