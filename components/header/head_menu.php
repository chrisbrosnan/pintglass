<?php

$home_link = home_url();

echo '<div id="head-inner">';
echo '<table style="width: 100%;"><tr>';
echo '<td style="text-align: center;">';
icon('hamburger');
echo '</td>';
echo '<td style="text-align: center;">';
echo '<a href="'.$home_link.'">';
icon('home');
echo '</a>';
echo '</td>';
echo '<td style="text-align: center;">';
icon('search');
echo '</td>';
echo '<td style="text-align: center;">';
icon('profile');
echo '</td>';
echo '</tr></table>';
echo '</div>';