<?php

use yii\db\Migration;

/**
 * Class m190915_081758_insertRepetitions
 */
class m190915_081758_insertRepetitions extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $rows = (new \yii\db\Query())
            ->select(['*'])
            ->from('workout_approaches')
            ->all();

        foreach($rows as $row) {
            if ($row['approach1'])
                $this->insert('workout_repetitions',
                    [
                        'date' => $row['date'],
                        'placeid' => $row['placeid'],
                        'exerciseid' => $row['exerciseid'],
                        'repetitions' => $row['approach1'],
                    ]
                );            
            if ($row['approach2'])
                $this->insert('workout_repetitions',
                    [
                        'date' => $row['date'],
                        'placeid' => $row['placeid'],
                        'exerciseid' => $row['exerciseid'],
                        'repetitions' => $row['approach2'],
                    ]
                );
            if ($row['approach3'])
                $this->insert('workout_repetitions',
                    [
                        'date' => $row['date'],
                        'placeid' => $row['placeid'],
                        'exerciseid' => $row['exerciseid'],
                        'repetitions' => $row['approach3'],
                    ]
                );
            if ($row['approach4'])
                $this->insert('workout_repetitions',
                    [
                        'date' => $row['date'],
                        'placeid' => $row['placeid'],
                        'exerciseid' => $row['exerciseid'],
                        'repetitions' => $row['approach4'],
                    ]
                );
            if ($row['approach5'])
                $this->insert('workout_repetitions',
                    [
                        'date' => $row['date'],
                        'placeid' => $row['placeid'],
                        'exerciseid' => $row['exerciseid'],
                        'repetitions' => $row['approach5'],
                    ]
                );
        }
        
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        echo "m190915_081758_insertRepetitions cannot be reverted.\n";
        $this->truncateTable('workout_repetitions');
        $this->execute('ALTER TABLE workout_repetitions AUTO_INCREMENT=0');
        return true;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m190915_081758_insertRepetitions cannot be reverted.\n";

        return false;
    }
    */
}
