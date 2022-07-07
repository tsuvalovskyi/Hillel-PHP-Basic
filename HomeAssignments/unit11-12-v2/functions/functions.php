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

        $tasks[$i]['firstNumber'] = $firstNumber;
        $tasks[$i]['secondNumber'] = $secondNumber;
        $tasks[$i]['operator'] = $operator;
        $tasks[$i]['id'] = $type . $i;
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

function get_result(string $operator, int $firstNumber, int $secondNumber): int|float
{
    $result = match ($operator) {
        "+" => $firstNumber + $secondNumber,
        "-" => $firstNumber - $secondNumber,
        "*" => $firstNumber * $secondNumber,
        "/" => $firstNumber / $secondNumber,
    };

    if ($operator === "/") {
        $result = round($result, 2);
    }

    return $result;
}

function get_user_score(array $tasksData): array
{
    $userScore = 0;

    foreach ($tasksData as $taskData) {

        $firstNumber = (int)$taskData['firstNumber'];
        $secondNumber = (int)$taskData['secondNumber'];
        $operator = $taskData['operator'];
        $userAnswer = $taskData['userAnswer'];

        $correctAnswer = get_result($operator, $firstNumber, $secondNumber);

        $answerType = gettype($correctAnswer);
        if ($answerType === "double") {
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
        "taskCounter" => count($tasksData)
    ];
}