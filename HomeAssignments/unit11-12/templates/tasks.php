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
                    name="<?php echo $task['id'] ?>"
                    placeholder="<?php echo $task['result'] ?>"
            >
        </p>
    <?php endforeach ?>
<?php endif ?>
