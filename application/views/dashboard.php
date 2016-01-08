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

            // Week navigation
            $nav_year = $dt->format('o');
            $nav_week = $dt->format('W');

            //Resetting start week to start with Sunday 
            $dt->modify('-1 day');
            
            $year = $dt->format('o');
            $month = $dt->format('m');
            $time=strtotime($dt->format('Y-m-d H:i:s'));
            
            $day_start = date("d", $time);
            $daysOfWeek = array('SU','MU','TU','WE','TH','FR','SA');
       ?>

            <a href="<?php echo $_SERVER['PHP_SELF'].'?week='.($nav_week-1).'&year='.$nav_year; ?>">Pre Week</a> <!--Previous week-->
            <?php 
            ?>
            <a href="<?php echo $_SERVER['PHP_SELF'].'?week='.($nav_week+1).'&year='.$nav_year; ?>">Next Week</a> <!--Next week-->
            <table>
                <tr>
                    <td>Project</td>
                        <?php
                       for ( $x = 0; $x < 7; $x++ )
                            echo "<td>".$daysOfWeek[$x]. "</td>";
                        ?>
                    </tr>
                    <td>Set Island</td>
                        <?php
                       for ( $x = 0; $x < 7; $x++ )
                            echo "<td>".date( "d", mktime( 0, 0, 0, $month, $day_start + $x, $year)). "</td>";
                        ?>
                    </tr>
                    <td>Pipe</td>
                        <?php
                       for ( $x = 0; $x < 7; $x++ )
                            echo "<td>".date( "d", mktime( 0, 0, 0, $month, $day_start + $x, $year)). "</td>";
                        ?>
                    </tr>
            </table>
	</div>
</div>