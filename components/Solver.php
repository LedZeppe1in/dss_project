<?php

namespace app\components;

/**
 * Solver - класс вычислений метрик группового выбора.
 */
class Solver
{
    /**
     * Ранжирование альтернатив методом АРАМИС.
     *
     * @param $sourceArray - исходный массив с альтернативами
     * @return array - ранжированный массив альтернатив
     */
    public function getRanksByAramis($sourceArray)
    {
        $bestAlternative = array();
        $worstAlternative = array();

        $maxMark = array_sum($sourceArray[0][0]);

        for ($i = 0; $i < count($sourceArray[0]); $i++) {
            $lenCriteria = count($sourceArray[0][$i]);
            for ($j = 0; $j < $lenCriteria; $j++) {
                // worst
                $worstAlternative[$i][$j] = ($j == $lenCriteria - 1) ? $maxMark : 0;
                // best
                if ($j == 0)
                    $bestAlternative[$i][$j] = $maxMark;
                else
                    $bestAlternative[$i][$j] = 0;
            }
        }

        $summ = [
            'best' => [],
            'worst' => []
        ];

        for ($row = 0; $row < count($sourceArray); $row++) {
            $summ['best'][$row] = 0;
            $summ['worst'][$row] = 0;
            for ($column = 0; $column < count($sourceArray[$row]); $column++) {
                for ($item = 0; $item < count($sourceArray[$row][$column]); $item++) {
                    $summ['best'][$row] = $summ['best'][$row] + abs($bestAlternative[$column][$item] -
                            $sourceArray[$row][$column][$item]);
                    $summ['worst'][$row] = $summ['worst'][$row] + abs($worstAlternative[$column][$item] -
                            $sourceArray[$row][$column][$item]);
                }
            }
        }

        $result = array();
        for ($i = 0; $i < count($sourceArray); $i++)
            $result[$i] = round($summ['best'][$i] / ($summ['best'][$i] + $summ['worst'][$i]), 3);

        return $result;
    }
}