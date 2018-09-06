<!DOCTYPE html>

<html>

<head>
  
  <title>Betrayal at the House on the Hill Stat Counter</title>
  <meta charset="utf-8"> 
  <link rel="stylesheet" type="text/css" href="charsheet.css">
  
  <!-- iPhone Stuff - 1st line disables zooming, 2nd line allows for fullscreen view (without browser widgets) -->
  
  <meta name="viewport" content="width=device-width; initial-scale=0.5; maximum-scale=0.5; user-scalable=0;">
  <meta name="apple-mobile-web-app-capable" content="yes">

</head>

<body>

<?php $character = $_GET["character"]; ?>

<div id="dossier"></div>
<div id="container">
  <div id="speedDiv"></div>
  <div id="mightDiv"></div>
  <div id="sanityDiv"></div>
  <div id="knowledgeDiv"></div>
</div>
<div class= "block"; id="timeDivContainer">
    <div class="centered" id="timeDiv"></div>
</div>


<script type="text/javascript">

var character = "<?php echo $character ?>";
var time = 0;

// spx, mtx, snx, knx: countdown used to display each subsequent value in an array starting with the highest

function speedCounter() {

  var spx;

  document.getElementById('speedDiv').innerHTML = ""; //blanks previous content
  document.getElementById('speedDiv').innerHTML += '<p class="statHeader"><span style="color:' + playerTextColor + '">Speed</span></p>';
  document.getElementById('speedDiv').innerHTML += '<input id="addSpeed" type="button" onclick="changeStat(this.id);" value="+"><br />';

  for (spx=8; spx>=0; spx--) {
    if ((spx == speed) && (spx == startingSpeed)) {
      document.getElementById('speedDiv').innerHTML += '<span style="color:' + playerTextColor + '">-' + sp[spx] + '-</span><br />';
      } else if (spx == speed) { 
      document.getElementById('speedDiv').innerHTML += '<span style="color:' + playerTextColor + '">' + sp[spx] + '</span><br />';
      } else if (spx == startingSpeed) {
      document.getElementById('speedDiv').innerHTML += '-' + sp[spx] + '-<br />';
      } else {
      document.getElementById('speedDiv').innerHTML += sp[spx] + "<br />"; 
    }
  }
  document.getElementById('speedDiv').innerHTML += '<input id="removeSpeed" type="button" onclick="changeStat(this.id);" value="-">';
}

function mightCounter() {

  var mtx;

  document.getElementById('mightDiv').innerHTML = "";
  document.getElementById('mightDiv').innerHTML += '<p class="statHeader"><span style="color:' + playerTextColor + '">Might</span></p>';
  document.getElementById('mightDiv').innerHTML += '<input id="addMight" type="button" onclick="changeStat(this.id);" value="+"><br />';

  for (mtx=8; mtx>=0; mtx--) {
    if ((mtx == might) && (mtx == startingMight)) {
      document.getElementById('mightDiv').innerHTML += '<span style="color:' + playerTextColor + '">-' + mt[mtx] + '-</span><br />';
      } else if (mtx == might) { 
      document.getElementById('mightDiv').innerHTML += '<span style="color:' + playerTextColor + '">' + mt[mtx] + '</span><br />';
      }else if (mtx == startingMight) { 
      document.getElementById('mightDiv').innerHTML += '-' + mt[mtx] + '-<br />';
      } else {
      document.getElementById('mightDiv').innerHTML += mt[mtx] + "<br />"; 
    }
  }
  document.getElementById('mightDiv').innerHTML += '<input id="removeMight" type="button" onclick="changeStat(this.id);" value="-">';  
}

function sanityCounter() {

  var snx;
  
  document.getElementById('sanityDiv').innerHTML = "";
  document.getElementById('sanityDiv').innerHTML += '<p class="statHeader"><span style="color:' + playerTextColor + '">Sanity</span></p>';
  document.getElementById('sanityDiv').innerHTML += '<input id="addSanity" type="button" onclick="changeStat(this.id);" value="+"><br />';

  for (snx=8; snx>=0; snx--) {
    if ((snx == sanity) && (snx == startingSanity)) { 
      document.getElementById('sanityDiv').innerHTML += '<span style="color:' + playerTextColor + '">-' + sn[snx] + '-</span><br />';
      } else if (snx == sanity) { 
      document.getElementById('sanityDiv').innerHTML += '<span style="color:' + playerTextColor + '">' + sn[snx] + '</span><br />';
      } else if (snx == startingSanity) { 
      document.getElementById('sanityDiv').innerHTML += '-' + sn[snx] + '-<br />';
      } else {
      document.getElementById('sanityDiv').innerHTML += sn[snx] + "<br />"; 
    }
  }
  document.getElementById('sanityDiv').innerHTML += '<input id="removeSanity" type="button" onclick="changeStat(this.id);" value="-">';  
}

function knowledgeCounter() {

  var knx;

  document.getElementById('knowledgeDiv').innerHTML = "";
  document.getElementById('knowledgeDiv').innerHTML += '<p class="statHeader"><span style="color:' + playerTextColor + '">Knowledge</span></p>';
  document.getElementById('knowledgeDiv').innerHTML += '<input id="addKnowledge" type="button" onclick="changeStat(this.id);" value="+"><br />';

  for (knx=8; knx>=0; knx--) {
    if ((knx == knowledge) && (knx == startingKnowledge)) { 
      document.getElementById('knowledgeDiv').innerHTML += '<span style="color:' + playerTextColor + '">-' + kn[knx] + '-</span><br />';
      } else if (knx == knowledge) { 
      document.getElementById('knowledgeDiv').innerHTML += '<span style="color:' + playerTextColor + '">' + kn[knx] + '</span><br />';
      } else if (knx == startingKnowledge) { 
      document.getElementById('knowledgeDiv').innerHTML += '-' + kn[knx] + '-<br />';
      } else {
      document.getElementById('knowledgeDiv').innerHTML += kn[knx] + "<br />"; 
    }
  }
  document.getElementById('knowledgeDiv').innerHTML += '<input id="removeKnowledge" type="button" onclick="changeStat(this.id);" value="-">';  
}

function timeCounter() {

  document.getElementById('timeDiv').innerHTML = "";
  document.getElementById('timeDiv').innerHTML += '<span class="timeSpans"; style="float: left"><input id="removeTime" type="button" onclick="changeStat(this.id);" value="-"></span>'; 
  document.getElementById('timeDiv').innerHTML += '<span class="timeSpans"; style="color:' + playerTextColor + '">Turn / Damage: ' + time + '</span>';
  document.getElementById('timeDiv').innerHTML += '<span class="timeSpans"; style="float: right;"><input id="addTime" type="button" onclick="changeStat(this.id);" value="+"></span>';  

}

function changeStat(stat) {

  switch (stat) {

    case "addSpeed":
      if (speed < 8) {
        speed++;
        speedCounter();
      }
    break;

    case "addMight":
      if (might < 8) {
        might++;
        mightCounter();
      }
    break;

    case "addSanity":
      if (sanity < 8) {
        sanity++;
        sanityCounter();
      }
    break;

    case "addKnowledge":
      if (knowledge < 8) {
        knowledge++;
        knowledgeCounter();
      }
    break;

    case "addTime":
      if (time < 12) {
        time++;
        timeCounter();
      }
    break;

    case "removeSpeed":
      if (speed > 0) {
        speed--;
        speedCounter();
      }
    break;

    case "removeMight":
      if (might > 0) {
        might--;
        mightCounter();
      }
    break;

    case "removeSanity":
      if (sanity > 0) {
        sanity--;
        sanityCounter();
      }
    break;

    case "removeKnowledge":
      if (knowledge > 0) {
        knowledge--;
        knowledgeCounter();
      }
    break;

    case "removeTime":
      if (time > 0) {
        time--;
        timeCounter();
      }
    break;

  }

}

// sp, mt, sn, kn: arrays holding the unique character stats
// speed, might, sanity, knowledge: contain the current index/key value of the corresponding array
// startingSpeed, etc.: for visually marking the starting stat

switch (character) {

  case "brandon":

    var sp=["0","3","4","4","4","5","6","7","8"];
    var mt=["0","2","3","3","4","5","6","6","7"];
    var sn=["0","3","3","3","4","5","6","7","8"];
    var kn=["0","1","3","3","5","5","6","6","7"];

    var speed = startingSpeed = 3;
    var might = startingMight = 4;
    var sanity = startingSanity = 4;
    var knowledge = startingKnowledge = 3;

    var playerTextColor="#00FF00";

  break;

  case "flash":

    var sp=["0","4","4","4","5","6","7","7","8"];
    var mt=["0","2","3","3","4","5","6","6","7"];
    var sn=["0","1","2","3","4","5","5","5","7"];
    var kn=["0","2","3","3","4","5","5","5","7"];

    var speed = startingSpeed = 5;
    var might = startingMight = 3;
    var sanity = startingSanity = 3;
    var knowledge = startingKnowledge = 3;

    var playerTextColor="#E10000";

  break;

  case "rhinehardt":

    var sp=["0","2","3","3","4","5","6","7","7"];
    var mt=["0","1","2","2","4","4","5","5","7"];
    var sn=["0","3","4","5","5","6","7","7","8"];
    var kn=["0","1","3","3","4","5","6","6","8"];

    var speed = startingSpeed = 3;
    var might = startingMight = 3;
    var sanity = startingSanity = 5;
    var knowledge = startingKnowledge = 4;

    var playerTextColor="#FFFFFF";

  break;

  case "heather":

    var sp=["0","3","3","4","5","6","6","7","8"];
    var mt=["0","3","3","3","4","5","6","7","8"];
    var sn=["0","3","3","3","4","5","6","6","6"];
    var kn=["0","2","3","3","4","5","6","7","8"];

    var speed = startingSpeed = 3;
    var might = startingMight = 3;
    var sanity = startingSanity = 3;
    var knowledge = startingKnowledge = 5;

    var playerTextColor="#B232B2";

  break;

  case "jenny":

    var sp=["0","2","3","4","4","4","5","6","8"];
    var mt=["0","3","4","4","4","4","5","6","8"];
    var sn=["0","1","1","2","4","4","4","5","6"];
    var kn=["0","2","3","3","4","4","5","6","8"];

    var speed = startingSpeed = 4;
    var might = startingMight = 3;
    var sanity = startingSanity = 5;
    var knowledge = startingKnowledge = 3;

    var playerTextColor="#B232B2";

  break;

  case "zostra":

    var sp=["0","2","3","3","5","5","6","6","7"];
    var mt=["0","2","3","3","4","5","5","5","6"];
    var sn=["0","4","4","4","5","6","7","8","8"];
    var kn=["0","1","3","4","4","4","5","6","6"];

    var speed = startingSpeed = 3;
    var might = startingMight = 4;
    var sanity = startingSanity = 3;
    var knowledge = startingKnowledge = 4;

    var playerTextColor="#56CAFF";

  break;

  case "missy":

    var sp=["0","3","4","5","6","6","6","7","7"];
    var mt=["0","2","3","3","3","4","5","6","7"];
    var sn=["0","1","2","3","4","5","5","6","7"];
    var kn=["0","2","3","4","4","5","6","6","6"];

    var speed = startingSpeed = 3;
    var might = startingMight = 4;
    var sanity = startingSanity = 3;
    var knowledge = startingKnowledge = 4;

    var playerTextColor="#FFA500";

  break;

  case "ox":

    var sp=["0","2","2","2","3","4","5","5","6"];
    var mt=["0","4","5","5","6","6","7","8","8"];
    var sn=["0","2","2","3","4","5","5","6","7"];
    var kn=["0","2","2","3","3","5","5","6","6"];

    var speed = startingSpeed = 5;
    var might = startingMight = 3;
    var sanity = startingSanity = 3;
    var knowledge = startingKnowledge = 3;

    var playerTextColor="#E10000";

  break;

  case "peter":

    var sp=["0","3","3","3","4","6","6","7","7"];
    var mt=["0","2","3","3","4","5","5","6","8"];
    var sn=["0","3","4","4","4","5","6","6","7"];
    var kn=["0","3","4","4","5","6","7","7","8"];

    var speed = startingSpeed = 4;
    var might = startingMight = 3;
    var sanity = startingSanity = 4;
    var knowledge = startingKnowledge = 3;

    var playerTextColor="#00FF00";

  break;

  case "longfellow":

    var sp=["0","2","2","4","4","5","5","6","6"];
    var mt=["0","1","2","3","4","5","5","6","6"];
    var sn=["0","1","3","3","4","5","5","6","7"];
    var kn=["0","4","5","5","5","5","6","7","8"];

    var speed = startingSpeed = 4;
    var might = startingMight = 3;
    var sanity = startingSanity = 3;
    var knowledge = startingKnowledge = 5;

    var playerTextColor="#FFFFFF";

  break;

  case "vivian":

    var sp=["0","3","4","4","4","4","6","7","8"];
    var mt=["0","2","2","2","4","4","5","6","6"];
    var sn=["0","4","4","4","5","6","7","8","8"];
    var kn=["0","4","5","5","5","5","6","6","7"];

    var speed = startingSpeed = 4;
    var might = startingMight = 3;
    var sanity = startingSanity = 3;
    var knowledge = startingKnowledge = 4;

    var playerTextColor="#56CAFF";

  break;

  case "zoe":

    var sp=["0","4","4","4","4","5","6","8","8"];
    var mt=["0","2","2","3","3","4","4","6","7"];
    var sn=["0","3","4","5","5","6","6","7","8"];
    var kn=["0","1","2","3","4","4","5","5","5"];

    var speed = startingSpeed = 4;
    var might = startingMight = 4;
    var sanity = startingSanity = 3;
    var knowledge = startingKnowledge = 3;

    var playerTextColor="#FFA500";

  break;

}

// Eventually replace this with graphics of the character cards
document.getElementById('dossier').innerHTML = '<img src="' + character + '.jpg" />';

// Run each stat once, initially
speedCounter() ;
mightCounter() ;
sanityCounter() ;
knowledgeCounter() ;
timeCounter() ;

// iPhone: Disable Scrolling
document.addEventListener(
  'touchmove',
  function(e) {
    e.preventDefault();
  },
  false
);

</script>
</body>
</html>