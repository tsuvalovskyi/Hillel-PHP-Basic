<?php

$string = "Lorem ipsum dolor sit amet, consectetur - adipiscing elit , sed do eiusmod tempor incididunt ut labore et dolore magna aliqua";
$stringLength = strlen($string);

/*
    За умовами задачі ми знаємо, що наш рядок не починається і не закінчується пробілом, проте може бути пустим.
    За таких умов, кількість слів у непустому рядку буде на один 1 більше, ніж кількість одинарних пробілів.
    Тому рахувати кількість слів у ньому ($wordsQuantity) ми починаємо з одиниці.
*/

if ($stringLength !== 0) {

    $wordsQuantity = 1;
    for ($i = 0; $i < $stringLength; $i++) {
        $letter = substr($string, $i, 1);
        $nextLetter = substr($string, $i + 1, 1);

        if ($letter === " " && $nextLetter !== " ") {

            //Так як розділові знаки не є словами, пропускаємо випадки "слово - слово", "слово , слово" і т.д.
            if (
                $nextLetter === "-" ||
                $nextLetter === "," ||
                $nextLetter === ":" ||
                $nextLetter === ";" ||
                $nextLetter === "." ||
                $nextLetter === "!" ||
                $nextLetter === "?"
            ) {
                continue;
            }

            $wordsQuantity++;
        }
    }

    echo "У рядку \"" . $string . "\"" . PHP_EOL;
    echo "Кількість слів - " . $wordsQuantity;

} else {
    echo "Цей рядок пустий";
}

echo PHP_EOL;