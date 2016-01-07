<div class="row">
	<div class="small-12 columns">
		<h3 class="x1-top">Dashboard</h3>
        	<h2 class="x1-top">Welcome!</h2>
        <?php
            $dt = new DateTime;
            if (isset($_GET['year']) && isset($_GET['week'])) {
                $dt->setISODate($_GET['year'], $_GET['week']);
            } else {
                $dt->setISODate($dt->format('o'), $dt->format('W'));
            }
            // echo "<span>" . $dt->format('o') . "</span>\n";
            // echo "<span>" . $dt->format('W') . "</span>\n";
            // echo "<span>" . $dt->format('d') . "</span>\n";
            $year = $dt->format('o');
            $week = $dt->format('W');
            // echo strtotime("now"), "\n";
            // echo strtotime("saturday"), "\n";
            ?>

            <a href="<?php echo $_SERVER['PHP_SELF'].'?week='.($week-1).'&year='.$year; ?>">Pre Week</a> <!--Previous week-->
            <?php echo date('F'); echo $dt->format('d') ." <span> - </span> "    ?>
            <a href="<?php echo $_SERVER['PHP_SELF'].'?week='.($week+1).'&year='.$year; ?>">Next Week</a> <!--Next week-->

            <table>
                <tr>
                    <td>Project</td>
                        <?php
                        do {
                            echo "<td>" . $dt->format('l') . "<br>" . $dt->format('d M Y') . "</td>\n";
                            $dt->modify('+1 day');
                        } while ($week == $dt->format('W'));
                        ?>
                    </tr>
            </table>
	</div>
</div>
	</div>
</div>
