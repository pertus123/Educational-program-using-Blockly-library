  var myInterpreter;
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

  Blockly.JavaScript['apple_image'] = function(block) {return ['\'사과이미지\'', Blockly.JavaScript.ORDER_ATOMIC];}
  Blockly.Python['apple_image'] = function(block) {return ['\'사과이미지\'', Blockly.Python.ORDER_ATOMIC];}
  Blockly.JavaScript['banana_image'] = function(block) {return ['\'바나나이미지\'', Blockly.JavaScript.ORDER_ATOMIC];}
  Blockly.Python['banana_image'] = function(block) {return ['\'바나나이미지\'', Blockly.Python.ORDER_ATOMIC];}

  
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

    function disable(disabled) {
      document.getElementById('runButton').disabled = disabled;
    }

    function inoButton(){
      let {PythonShell} = require('python-shell');
      PythonShell.run('test.py', null, function () { });
    }