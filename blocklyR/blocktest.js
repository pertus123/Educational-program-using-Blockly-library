require('blolib/blockly_compressed.js');
Blockly.defineBlocksWithJsonArray();

{
  "type": "example_dropdown",
  "message0": "drop down: %1",
  "args0": [
    {
      "type": "field_dropdown",
      "name": "FIELDNAME",
      "options": [
        [ "first", "ITEM1" ],
        [ "second", "ITEM2" ]
      ]
    }
  ],
  "colour":290
}