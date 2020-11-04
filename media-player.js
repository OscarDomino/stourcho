<script language="JavaScript" type="text/javascript">
<!--
document.addEventListener("DOMContentLoaded", function() { initialiseMediaPlayer(); }, false);
var mediaPlayer;
var playPauseBtn;
var muteBtn;
var progressBar;

function initialiseMediaPlayer() {
   mediaPlayer = document.getElementById("media-audio");
	 
	 playPauseBtn = document.getElementById("play-pause-button");
	 muteBtn = document.getElementById("mute-button");
   progressBar = document.getElementById("progress-bar");
	 
	 mediaPlayer.controls = false;
	 
	 mediaPlayer.addEventListener("timeupdate", updateProgressBar, false);
	 
	 mediaPlayer.addEventListener("play", function() {
   		changeButtonType(playPauseBtn, "pause");
	 }, false);
	 mediaPlayer.addEventListener("pause", function() {
   		changeButtonType(playPauseBtn, "play");
	 }, false);
	 mediaPlayer.addEventListener("volumechange", function(e) {
	 		if (mediaPlayer.muted) changeButtonType(muteBtn, "unmute");
			else changeButtonType(muteBtn, "mute");
	 }, false);
	 mediaPlayer.addEventListener("ended", function() { this.pause(); }, false);
}

function togglePlayPause() {
   if (mediaPlayer.paused || mediaPlayer.ended) {
      changeButtonType(playPauseBtn, "pause");
      mediaPlayer.play();
   }
   else {
      changeButtonType(playPauseBtn, "play");
      mediaPlayer.pause();
   }
}

function stopPlayer() {
	 mediaPlayer.pause();
	 mediaPlayer.currentTime = 0;
}

function changeVolume(direction) {
	 if (direction === "+") mediaPlayer.volume += mediaPlayer.volume == 1 ? 0 : 0.1;
	 else mediaPlayer.volume -= (mediaPlayer.volume == 0 ? 0 : 0.1);
	 mediaPlayer.volume = parseFloat(mediaPlayer.volume).tofixed(1);
}

function toggleMute() {
   if (mediaPlayer.muted) {
	 changeButtonType(muteBtn, "mute");
	 mediaPlayer.muted = false;
	 }
	 else {
	 changeButtonType(muteBtn, "unmute");
	 mediaPlayer.muted = true;
	 }
}
	 	 
function changeButtonType(btn, value) {
   btn.title = value;
   btn.innerHTML = value;
   btn.className = value;
}

function replayMedia() {
   resetPlayer();
   mediaPlayer.play();
}

function updateProgressBar() {
   var percentage = Math.floor((100 / mediaPlayer.duration) * mediaPlayer.currentTime);
   progressBar.value = percentage;
   progressBar.innerHTML = percentage + "% played";
}

function resetPlayer() {
   progressBar.value = 0;
   mediaPlayer.currentTime = 0;
   changeButtonType(playPauseBtn, "play");
}

//-->
</script>