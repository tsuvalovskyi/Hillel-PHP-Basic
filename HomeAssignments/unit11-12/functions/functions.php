<?php

session_start();

function match_operator(string $type): string
{
    return match ($type) {
        "addition" => "+",
        "subtraction" => "-",
        "multiplication" => "*",
        "division" => "/",
    };
}

function get_result(string $type, int $firstNumber, int $secondNumber): int|float
{
    $result = match ($type) {
        "addition" => $firstNumber + $secondNumber,
        "subtraction" => $firstNumber - $secondNumber,
        "multiplication" => $firstNumber * $secondNumber,
        "division" => $firstNumber / $secondNumber,
    };

    if ($type === "division") {
        $result = round($result, 2);
    }

    return $result;
}

function generate_tasks(string $type, int $qty): array
{
    $tasks = [];
    for ($i = 1; $i <= $qty; $i++) {
        $firstNumber = random_int(-100, 100);
        $secondNumber = random_int(-100, 100);

        //Додаємо перегенерацію, для випадку з операцією ділення і другим числом === 0
        if ($type === "division" && $secondNumber === 0) {
            $i--;
            continue;
        }

        $operator = match_operator($type);
        $result = get_result($type, $firstNumber, $secondNumber);

        $tasks[$i] = [];

        $tasks[$i]['firstNumber'] = $firstNumber;
        $tasks[$i]['secondNumber'] = $secondNumber;
        $tasks[$i]['operator'] = $operator;
        $tasks[$i]['id'] = $type . $i;
        $tasks[$i]['result'] = $result;

        $_SESSION['tasks'][$tasks[$i]['id']] = $tasks[$i];
    }

    return $tasks;
}

function set_alert(string $type, string $text): void
{
    $_SESSION['alerts'][] = [
        'type' => $type,
        'text' => $text
    ];
}

function get_alerts(): array
{
    return $_SESSION['alerts'] ?? [];
}

function clear_alerts(): void
{
    $_SESSION['alerts'] = [];
}

function get_user_score(array $userAnswers, array $tasksInfo): array
{
    $userScore = 0;
    foreach ($userAnswers as $key => $userAnswer) {
        $correctAnswer = $tasksInfo[$key]['result'];

        $type = gettype($correctAnswer);
        if ($type === "double") {
            $userAnswer = (float)$userAnswer;
        } else {
            $userAnswer = (int)$userAnswer;
        }

        if ($userAnswer === $correctAnswer) {
            $userScore++;
        }
    }

    return [
        "score" => $userScore,
        "taskCounter" => count($tasksInfo)
    ];
}