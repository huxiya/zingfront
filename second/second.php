
<?php
/**
题目描述：

        某些整数能分解成若干个连续整数的和的形式。

        例如：

        15 = 1 + 2＋3＋4＋5

        15 = 4 + 5 + 6

        15 = 7 + 8

        某些整数不能分解为连续整数的和，例如：16

        输入：一个整数N（N <= 10000）

        输出：整数N对应的所有分解组合，按照每个分解中的最小整数从小到大输出，每个分解占一行，每个数字之间有一个空格（每行最后保留一个空格）；如果没有任何分解组合，则输出NONE。

实现思路：

        1. 个人对这个题目的理解是，先从数学的角度分析，N就是分解成所有  连续整数的和，所以：设初始数为m，有k个数，则末尾数为m+k-1，分正整数和负整数，可得和 ：z=（m+m+k-1）*k/2，即：(2m+k-1)*k=z*2；

        2. 循环得出所有分解的组合，返回数组，如：方法decompose()；

        3. 然后，循环打印出所有组合。

代码实现：  

**/
function printing($num)
{
    if (floor($num)!=$num || $num>10000){
        echo '请输入 N <= 10000 的整数!';
        die;
    }
    $arr = decompose($num);
    if ($arr == 'NONE') {
        echo 'NONE';
        die;
    }
    echo '分解组合如下：';
    $group = [];
    foreach ($arr as $v) {
        $group[] = range($v[0], $v[1] + $v[0] - 1);
    }
    echo '（共', count($group), '组）';
    echo '<br>';
    foreach ($group as $k => $v) {
        echo '第' . ($k + 1) . '组：';
        foreach ($v as $vv) {
            echo $vv . ' ';
        }
        echo '<br>';
    }
}
// 分解过程
function decompose($num)
{
    $arr = [];
    if ($num < 0) {
        // 负整数处理
        for ($i = -1; $i > $num; $i--) {
            for ($j = 2; $j < abs($num); $j++) {
                if (2 * $num == (2 * $i + $j - 1) * $j) {
                    $arr[] = [$i, $j];
                }
            }
        }
    } else {
        // 负整数处理
        for ($i = 1; $i < $num; $i++) {
            for ($j = 0; $j < $num; $j++) {
                if (2 * $num == (2 * $i + $j - 1) * $j) {
                    $arr[] = [$i, $j];
                }
            }
        }
    }
    if (empty($arr)) {
        return 'NONE';
    } else {
        return $arr;
    }
}


printing(15);
?>
