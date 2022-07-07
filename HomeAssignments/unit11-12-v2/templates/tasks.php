<?php if (!empty($tasks)): ?>
    <?php foreach ($tasks as $task): ?>
        <p>
            <label for="<?php echo $task['id'] ?>">
                <span class="number">
                    <?php if ($task['firstNumber'] < 0): ?>
                        (<?php echo $task['firstNumber'] ?>)
                    <?php else: ?>
                        <?php echo $task['firstNumber'] ?>
                    <?php endif; ?>
                </span>

                <span class="operator">
                    <?php echo $task['operator'] ?>
                </span>
                <span class="number">
                    <?php if ($task['secondNumber'] < 0): ?>
                        (<?php echo $task['secondNumber'] ?>)
                    <?php else: ?>
                        <?php echo $task['secondNumber'] ?>
                    <?php endif; ?>
                </span>
                <span class="equal">
                    =
                </span>
            </label>
            <input
                    type="number"
                    step="0.01"
                    id="<?php echo $task['id'] ?>"
                    name="<?php echo $task['id'] ?>[userAnswer]"
            >
            <input
                    type="hidden"
                    name="<?php echo $task['id'] ?>[firstNumber]"
                    value="<?php echo $task['firstNumber'] ?>"
            >
            <input
                    type="hidden"
                    name="<?php echo $task['id'] ?>[operator]"
                    value="<?php echo $task['operator'] ?>"
            >
            <input
                    type="hidden"
                    name="<?php echo $task['id'] ?>[secondNumber]"
                    value="<?php echo $task['secondNumber'] ?>"
            >
        </p>
    <?php endforeach ?>
<?php endif ?>
