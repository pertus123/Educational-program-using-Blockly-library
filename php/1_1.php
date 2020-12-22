<!DOCTYPE html>
<?php

session_start();

if(!isset($_SESSION['user_id'])){
  header('Location: ./login.html');
}

  

  $db=mysql_connect("localhost","opert1564","ehdtlr1!");
  mysql_select_db("opert1564",$db);

  $id = $_SESSION['user_id'];

  $db_sql = "SELECT * FROM UserInfo WHERE id ='$id'";
  $result = mysql_query($db_sql);
  $row = mysql_fetch_array($result);

  $Q = 10;

  $addscore = $Q + $row[score];

?>
<html>
<head>
  <title> 1_1 </title>
     
  <style>
    #textarea{ position: absolute; top: 177px; left: 829px; border: none; z-index: 1; resize: none; outline: none}
    #textarea2{ position: absolute; top: 70px; left: 1200px; display: none;}
.my-box { position: absolute; top: 91.4px; left: 810px; border: 3px solid gray;  height: 479px; width: 250px;background-color: #FAFAFA;}
   #lstFavorites{position: absolute; top: 35px; left: 115px; border : none; background-color: #FAFAFA;}
   #result2{background-color: #F2F2F2;  resize: none; outline: none}
#Language{position: absolute; top: 30px; left: 20px;}

  </style>
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/><!--한글 깨짐방지-->
<script src="blocklyR/blolib/blockly_compressed.js"></script>
<script src="blocklyR/blolib/blocks_compressed.js"></script> <!-- -->
<script src="blocklyR/msg/js/ko.js"></script>
<script src="blocklyR/blolib/javascript_compressed.js"></script>
<script src="blocklyR/blolib/python_compressed.js"></script>
<script src="blocklyR/blolib/js-py-test.js"></script>
 <script src="blocklyR/blolib/acorn.js"></script>
 <script src="blocklyR/blolib/interpreter.js"></script>
<script type="text/javascript" src="http://code.jquery.com/jquery-1.8.3.min.js"></script>
<script type="text/javascript" src="codemirror.js"></script>
<link rel="stylesheet" href="codemirror.css"/>
    <script src="javascript.js"></script>

<script>
  Blockly.defineBlocksWithJsonArray([
{
  "type": "apple_image",
  "message0": "%1",
  "args0": [
    {
      "name": "NAME",
      "type": "field_image",
      "src": "image/apple.jpg",
      "width": 20,
      "height": 20
    }
  ],
  "colour":160,
  "output":null
},
{
  "type": "banana_image",
  "message0": "%1",
  "args0": [
    {
      "type": "field_image",
      "src": "image/banana.jpg",
      "width": 20,
      "height": 20,
      "alt": "*"
    }
  ],
  "colour":160,
  "output":null
}

]);

  Blockly.JavaScript['apple_image'] = function(block) {return ['\'사과\'', Blockly.JavaScript.ORDER_ATOMIC];}
  Blockly.Python['apple_image'] = function(block) {return ['\'사과\'', Blockly.Python.ORDER_ATOMIC];}
  Blockly.JavaScript['banana_image'] = function(block) {return ['\'바나나\'', Blockly.JavaScript.ORDER_ATOMIC];}
  Blockly.Python['banana_image'] = function(block) {return ['\'바나나\'', Blockly.Python.ORDER_ATOMIC];}


  var myInterpreter;
  var BlockResult = "사과";
  function initAlert(interpreter, scope) {
      var wrapper = function(text) {
        document.getElementById('result2').value += text;
      };
      interpreter.setProperty(scope, 'alert',
          interpreter.createNativeFunction(wrapper));
    }

    function parseButton() {
      document.getElementById('result2').value = "";
      var code = document.getElementById('textarea2').value;
      myInterpreter = new Interpreter(code, initAlert);
      disable('');
    }

      function runButton() {
        parseButton();
      
      myInterpreter.run();
      if(BlockResult === document.getElementById('result2').value){
        alert("정답입니다!");
        <?php
      if($row[Q1_1] == 0){
      mysql_query("UPDATE UserInfo SET score = '$addscore' WHERE id ='$id'");
      mysql_query("UPDATE UserInfo SET Q1_1 = 1 WHERE id ='$id'");
      echo "alert('정답입니다!');";
      echo "alert('$row[score]');";
      echo "alert('$Q');";
      }
    ?>
    
      }
      else{
        alert("틀렸습니다!");
      }
    }

    function disable(disabled) {
      document.getElementById('runButton').disabled = disabled;
    }

    function inoButton(){
      let {PythonShell} = require('python-shell');
      PythonShell.run('test.py', null, function () { });
    }
</script>

</head>
<body>
  <p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;이미 해결된 문제입니다!</p>
  <p>1-1. 사과 이미지 블럭을 활용하여 "사과"를 출력하시오.</p>

<div id="blocklyDiv" style="height: 479.5px; width: 800px; border: 3px solid gray;"></div>
<xml id="toolbox" style="display: none">
  <block type="text_print"></block>
  <block type="apple_image"></block>
  <block type="banana_image"></block>

</xml>
<script>

  var selectedText="";
  var workspace = Blockly.inject('blocklyDiv',
    {toolbox: document.getElementById('toolbox'),
     zoom:
         {controls: true,
          wheel: true,
          startScale: 1.0,
          maxScale: 3,
          minScale: 0.3,
          scaleSpeed: 1.2},
     trashcan: true});

$(document).ready(function () {
            $('#lstFavorites').change(function () {
                selectedText = $("option:selected").text();
                myUpdateFunction();
            });

        });


function myUpdateFunction(event) {
  var code, code2;

  if(selectedText == "JavaScript"){
    code = Blockly.JavaScript.workspaceToCode(workspace);
    code2 = Blockly.JavaScript.workspaceToCode(workspace);
  }
  else if(selectedText == "Python"){
    code = Blockly.Python.workspaceToCode(workspace);
    code2 = Blockly.JavaScript.workspaceToCode(workspace);
  }
  else {code = "언어를 선택해주세요!";}



  document.getElementById('textarea').value = code;
  document.getElementById('textarea2').value = code2;


}

workspace.addChangeListener(myUpdateFunction);


</script>


<textarea rows="26" cols="31.5" id = "textarea" readonly>
</textarea>
<a><font size="4"> 출 력 </font></a>
<br>
<textarea rows="5" cols="163" id = "result2" style="border:0;" readonly ></textarea>
 <textarea rows = "30" cols = "30" id = "textarea2" ></textarea>
<a id = "result2"><font size = "3"></font></a>
<br>



<div class="my-box" rows="33" cols="30">
<a id = "Language"> Language :  </a>
 <select id="lstFavorites">
    <option>선택하세요</option>
    <option>JavaScript</option>
    <option>Python</option>
</select>
</div>

<script type="text/javascript"></script>
  <button onclick="runButton()" id="runButton"  style="background-color: white; border: none;outline: none; position: absolute; top : 570px; left : 1030px"><img src="image/재생.png" width="30" height="30"></button> 
</body>
</html>