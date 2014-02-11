<?php session_start(); ?>
<?php
$vote = (int) $_GET['vote'];

//get content of textfile
$filename = "poll_result.txt";


$content = file($filename);

//put content in array
$array = explode("||", $content[0]);
$yes = $array[0];
$no = $array[1];
$count = $array[2];
$mayBe = $array[3];
$notSure = $array[4];



if ($vote == 1) {
  $yes = $yes + 1;
  $count = $count + 1;
  $yes_ctr = $yes_ctr  + 1;
}

if ($vote == 2) {
  	$count = $count + 1;
  	$no = $no + 1;
  	$no_ctr = $no_ctr + 1;
}

if ($vote == 3) {
  $notSure = $notSure + 1;
  $count = $count + 1;
}

if ($vote == 4) {
  $mayBe = $mayBe + 1;
  $count = $count + 1;
}

$file = dirname(__file__)."/".$filename; 
//insert votes to txt file
if( $vote ) {
	$insertvote = $yes."||".$no."||".$count."||".$mayBe."||".$notSure;
	$fp = fopen($file , 'w');
	fwrite($fp,$insertvote);
	fclose($fp);
	$_SESSION['check'] = 2;
}
?>
<!-- 
<h2>Result:</h2>
<table>
<tr>
<td>Yes:</td>
<td>
<img src="poll.gif"
width='<?php echo(100*round($yes/($no+$yes),2)); ?>'
height='20'>
<?php echo(100*round($yes/($no+$yes),2)); ?>%
</td>
</tr>
<tr>
<td>No:</td>
<td>
<img src="poll.gif"
width='<?php echo(100*round($no/($no+$yes),2)); ?>'
height='20'>
<?php echo(100*round($no/($no+$yes),2)); ?>%
</td>
</tr>
<tr>
<td><?php echo $count; ?></td>
</tr>
</table>  -->

<p class="pollques">Results :- </p>
	<div class="option">
		<p>
			<b>Yes</b> 
			<br>
			<em class="pollStats">(<?php echo(100*round($yes/($no+$yes+$mayBe+$notSure),2)); ?>%, <?php echo $yes; ?> votes)</em>
		</p>
		<div style="width: <?php echo (100*round($yes/($no+$yes+$mayBe+$notSure),2)); ?>px;" class="bar "></div>
	</div>
	<div class="option">
		<p>
			<b>Maybe</b> 
			<br>
			<em class="pollStats">(<?php echo(100*round($mayBe/($no+$yes+$mayBe+$notSure),2)); ?>%, <?php echo $mayBe; ?> votes)</em>
		</p>
		<div style="width: <?php echo (100*round($mayBe/($no+$yes+$mayBe+$notSure),2)); ?>px;" class="bar "></div>
	</div>
	<div class="option" style="padding-bottom: 10px;">
		<p>
			<b>Not Sure</b> 
			<br>
			<em class="pollStats">(<?php echo(100*round($notSure/($no+$yes+$mayBe+$notSure),2)); ?>%,  <?php echo $notSure; ?> votes)</em>
		</p>
		<div style="width: <?php echo (100*round($notSure/($no+$yes+$mayBe+$notSure),2)); ?>px;" class="bar "></div>
	</div>
	<div class="option" style="padding-bottom: 10px;">
		<p>
			<b>No</b> 
			<br>
			<em class="pollStats">(<?php echo(100*round($no/($no+$yes+$mayBe+$notSure),2)); ?>%,  <?php echo $no; ?> votes)</em>
		</p>
		<div style="width: <?php echo (100*round($no/($no+$yes+$mayBe+$notSure),2)); ?>px;" class="bar "></div>
	</div>

	<span class="totalVotes">Number of de voters: <?php echo $count; ?></span>