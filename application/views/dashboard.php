<div class="row">
	<div class="small-12 columns">
		<h3>Dashboard</h3>
        <?php
            $dt = new DateTime;
            if (isset($_GET['year']) && isset($_GET['week'])) {
                $dt->setISODate($_GET['year'], $_GET['week']);
            } else {
                $dt->setISODate($dt->format('o'), $dt->format('W'));
            }

            $year = $dt->format('o');
            $week = $dt->format('W');

            $dt->modify('-1 day');
            $day_start = date( "d", strtotime( $dt->format('Y-m-d H:i:s')));
            
           
            ?>

            <a href="<?php echo $_SERVER['PHP_SELF'].'?week='.($week-1).'&year='.$year; ?>">Pre Week</a> <!--Previous week-->
            <?php 
                // echo date("F d",strtotime('last sunday')).' To '.date("F d",strtotime("saturday this week"));
                echo date( "F d", mktime( 0, 0, 0, date( "m" ), $day_start, date( "y" ) )). ' To '. date( "d", mktime( 0, 0, 0, date( "m" ), $day_start + 6, date( "y" ) ));
            ?>
            <a href="<?php echo $_SERVER['PHP_SELF'].'?week='.($week+1).'&year='.$year; ?>">Next Week</a> <!--Next week-->
            <table>
                <tr>
                    <td>Project</td>
                        <?php
                       for ( $x = 0; $x < 7; $x++ )
                            echo "<td>".date( "D", mktime( 0, 0, 0, date( "m" ), $day_start + $x, date( "y" ) )). "</td>";
                        ?>
                    </tr>
                    <td>Set Island</td>
                        <?php
                       for ( $x = 0; $x < 7; $x++ )
                            echo "<td>".date( "d", mktime( 0, 0, 0, date( "m" ), $day_start + $x, date( "y" ) )). "</td>";
                        ?>
                    </tr>
                    <td>Pipe</td>
                        <?php
                       for ( $x = 0; $x < 7; $x++ )
                            echo "<td>".date( "d", mktime( 0, 0, 0, date( "m" ), $day_start + $x, date( "y" ) )). "</td>";
                        ?>
                    </tr>
            </table>
	</div>
</div>
