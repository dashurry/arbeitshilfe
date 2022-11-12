<?php
# Generated by the protocol buffer compiler.  DO NOT EDIT!
# source: google/cloud/speech/v1p1beta1/cloud_speech.proto

namespace GPBMetadata\Google\Cloud\Speech\V1P1Beta1;

class CloudSpeech
{
    public static $is_initialized = false;

    public static function initOnce() {
        $pool = \Google\Protobuf\Internal\DescriptorPool::getGeneratedPool();

        if (static::$is_initialized == true) {
          return;
        }
        \GPBMetadata\Google\Api\Annotations::initOnce();
        \GPBMetadata\Google\Longrunning\Operations::initOnce();
        \GPBMetadata\Google\Protobuf\Any::initOnce();
        \GPBMetadata\Google\Protobuf\Duration::initOnce();
        \GPBMetadata\Google\Protobuf\GPBEmpty::initOnce();
        \GPBMetadata\Google\Protobuf\Timestamp::initOnce();
        \GPBMetadata\Google\Rpc\Status::initOnce();
        $pool->internalAddGeneratedFile(hex2bin(
            "0aba260a30676f6f676c652f636c6f75642f7370656563682f7631703162" .
            "657461312f636c6f75645f7370656563682e70726f746f121d676f6f676c" .
            "652e636c6f75642e7370656563682e7631703162657461311a23676f6f67" .
            "6c652f6c6f6e6772756e6e696e672f6f7065726174696f6e732e70726f74" .
            "6f1a19676f6f676c652f70726f746f6275662f616e792e70726f746f1a1e" .
            "676f6f676c652f70726f746f6275662f6475726174696f6e2e70726f746f" .
            "1a1b676f6f676c652f70726f746f6275662f656d7074792e70726f746f1a" .
            "1f676f6f676c652f70726f746f6275662f74696d657374616d702e70726f" .
            "746f1a17676f6f676c652f7270632f7374617475732e70726f746f229401" .
            "0a105265636f676e697a655265717565737412400a06636f6e6669671801" .
            "2001280b32302e676f6f676c652e636c6f75642e7370656563682e763170" .
            "3162657461312e5265636f676e6974696f6e436f6e666967123e0a056175" .
            "64696f18022001280b322f2e676f6f676c652e636c6f75642e7370656563" .
            "682e7631703162657461312e5265636f676e6974696f6e417564696f229f" .
            "010a1b4c6f6e6752756e6e696e675265636f676e697a6552657175657374" .
            "12400a06636f6e66696718012001280b32302e676f6f676c652e636c6f75" .
            "642e7370656563682e7631703162657461312e5265636f676e6974696f6e" .
            "436f6e666967123e0a05617564696f18022001280b322f2e676f6f676c65" .
            "2e636c6f75642e7370656563682e7631703162657461312e5265636f676e" .
            "6974696f6e417564696f22a0010a1953747265616d696e675265636f676e" .
            "697a655265717565737412550a1073747265616d696e675f636f6e666967" .
            "18012001280b32392e676f6f676c652e636c6f75642e7370656563682e76" .
            "31703162657461312e53747265616d696e675265636f676e6974696f6e43" .
            "6f6e666967480012170a0d617564696f5f636f6e74656e7418022001280c" .
            "480042130a1173747265616d696e675f726571756573742291010a1a5374" .
            "7265616d696e675265636f676e6974696f6e436f6e66696712400a06636f" .
            "6e66696718012001280b32302e676f6f676c652e636c6f75642e73706565" .
            "63682e7631703162657461312e5265636f676e6974696f6e436f6e666967" .
            "12180a1073696e676c655f7574746572616e636518022001280812170a0f" .
            "696e746572696d5f726573756c747318032001280822b5060a115265636f" .
            "676e6974696f6e436f6e66696712500a08656e636f64696e671801200128" .
            "0e323e2e676f6f676c652e636c6f75642e7370656563682e763170316265" .
            "7461312e5265636f676e6974696f6e436f6e6669672e417564696f456e63" .
            "6f64696e6712190a1173616d706c655f726174655f686572747a18022001" .
            "2805121b0a13617564696f5f6368616e6e656c5f636f756e741807200128" .
            "05122f0a27656e61626c655f73657061726174655f7265636f676e697469" .
            "6f6e5f7065725f6368616e6e656c180c2001280812150a0d6c616e677561" .
            "67655f636f646518032001280912220a1a616c7465726e61746976655f6c" .
            "616e67756167655f636f64657318122003280912180a106d61785f616c74" .
            "65726e61746976657318042001280512180a1070726f66616e6974795f66" .
            "696c74657218052001280812450a0f7370656563685f636f6e7465787473" .
            "18062003280b322c2e676f6f676c652e636c6f75642e7370656563682e76" .
            "31703162657461312e537065656368436f6e7465787412200a18656e6162" .
            "6c655f776f72645f74696d655f6f666673657473180820012808121e0a16" .
            "656e61626c655f776f72645f636f6e666964656e6365180f200128081224" .
            "0a1c656e61626c655f6175746f6d617469635f70756e6374756174696f6e" .
            "180b2001280812220a1a656e61626c655f737065616b65725f6469617269" .
            "7a6174696f6e18102001280812210a1964696172697a6174696f6e5f7370" .
            "65616b65725f636f756e7418112001280512440a086d6574616461746118" .
            "092001280b32322e676f6f676c652e636c6f75642e7370656563682e7631" .
            "703162657461312e5265636f676e6974696f6e4d65746164617461120d0a" .
            "056d6f64656c180d2001280912140a0c7573655f656e68616e636564180e" .
            "200128082294010a0d417564696f456e636f64696e6712180a14454e434f" .
            "44494e475f554e5350454349464945441000120c0a084c494e4541523136" .
            "100112080a04464c4143100212090a054d554c4157100312070a03414d52" .
            "1004120a0a06414d525f57421005120c0a084f47475f4f5055531006121a" .
            "0a1653504545585f574954485f4845414445525f42595445100712070a03" .
            "4d5033100822d3080a135265636f676e6974696f6e4d6574616461746112" .
            "5c0a10696e746572616374696f6e5f7479706518012001280e32422e676f" .
            "6f676c652e636c6f75642e7370656563682e7631703162657461312e5265" .
            "636f676e6974696f6e4d657461646174612e496e746572616374696f6e54" .
            "79706512240a1c696e6475737472795f6e616963735f636f64655f6f665f" .
            "617564696f18032001280d12620a136d6963726f70686f6e655f64697374" .
            "616e636518042001280e32452e676f6f676c652e636c6f75642e73706565" .
            "63682e7631703162657461312e5265636f676e6974696f6e4d6574616461" .
            "74612e4d6963726f70686f6e6544697374616e636512610a136f72696769" .
            "6e616c5f6d656469615f7479706518052001280e32442e676f6f676c652e" .
            "636c6f75642e7370656563682e7631703162657461312e5265636f676e69" .
            "74696f6e4d657461646174612e4f726967696e616c4d6564696154797065" .
            "12650a157265636f7264696e675f6465766963655f747970651806200128" .
            "0e32462e676f6f676c652e636c6f75642e7370656563682e763170316265" .
            "7461312e5265636f676e6974696f6e4d657461646174612e5265636f7264" .
            "696e6744657669636554797065121d0a157265636f7264696e675f646576" .
            "6963655f6e616d65180720012809121a0a126f726967696e616c5f6d696d" .
            "655f7479706518082001280912150a0d6f6266757363617465645f696418" .
            "092001280312130a0b617564696f5f746f706963180a2001280922c5010a" .
            "0f496e746572616374696f6e5479706512200a1c494e544552414354494f" .
            "4e5f545950455f554e5350454349464945441000120e0a0a444953435553" .
            "53494f4e100112100a0c50524553454e544154494f4e1002120e0a0a5048" .
            "4f4e455f43414c4c1003120d0a09564f4943454d41494c1004121b0a1750" .
            "524f46455353494f4e414c4c595f50524f4455434544100512100a0c564f" .
            "4943455f534541524348100612110a0d564f4943455f434f4d4d414e4410" .
            "07120d0a09444943544154494f4e100822640a124d6963726f70686f6e65" .
            "44697374616e636512230a1f4d4943524f50484f4e455f44495354414e43" .
            "455f554e5350454349464945441000120d0a094e4541524649454c441001" .
            "120c0a084d49444649454c441002120c0a084641524649454c441003224e" .
            "0a114f726967696e616c4d656469615479706512230a1f4f524947494e41" .
            "4c5f4d454449415f545950455f554e535045434946494544100012090a05" .
            "415544494f100112090a05564944454f100222a4010a135265636f726469" .
            "6e674465766963655479706512250a215245434f5244494e475f44455649" .
            "43455f545950455f554e5350454349464945441000120e0a0a534d415254" .
            "50484f4e45100112060a0250431002120e0a0a50484f4e455f4c494e4510" .
            "03120b0a0756454849434c45100412180a144f544845525f4f5554444f4f" .
            "525f444556494345100512170a134f544845525f494e444f4f525f444556" .
            "4943451006222f0a0d537065656368436f6e74657874120f0a0770687261" .
            "736573180120032809120d0a05626f6f737418042001280222440a105265" .
            "636f676e6974696f6e417564696f12110a07636f6e74656e741801200128" .
            "0c4800120d0a037572691802200128094800420e0a0c617564696f5f736f" .
            "75726365225c0a115265636f676e697a65526573706f6e736512470a0772" .
            "6573756c747318022003280b32362e676f6f676c652e636c6f75642e7370" .
            "656563682e7631703162657461312e5370656563685265636f676e697469" .
            "6f6e526573756c7422670a1c4c6f6e6752756e6e696e675265636f676e69" .
            "7a65526573706f6e736512470a07726573756c747318022003280b32362e" .
            "676f6f676c652e636c6f75642e7370656563682e7631703162657461312e" .
            "5370656563685265636f676e6974696f6e526573756c74229e010a1c4c6f" .
            "6e6752756e6e696e675265636f676e697a654d6574616461746112180a10" .
            "70726f67726573735f70657263656e74180120012805122e0a0a73746172" .
            "745f74696d6518022001280b321a2e676f6f676c652e70726f746f627566" .
            "2e54696d657374616d7012340a106c6173745f7570646174655f74696d65" .
            "18032001280b321a2e676f6f676c652e70726f746f6275662e54696d6573" .
            "74616d7022bf020a1a53747265616d696e675265636f676e697a65526573" .
            "706f6e736512210a056572726f7218012001280b32122e676f6f676c652e" .
            "7270632e537461747573124a0a07726573756c747318022003280b32392e" .
            "676f6f676c652e636c6f75642e7370656563682e7631703162657461312e" .
            "53747265616d696e675265636f676e6974696f6e526573756c7412640a11" .
            "7370656563685f6576656e745f7479706518042001280e32492e676f6f67" .
            "6c652e636c6f75642e7370656563682e7631703162657461312e53747265" .
            "616d696e675265636f676e697a65526573706f6e73652e53706565636845" .
            "76656e7454797065224c0a0f5370656563684576656e7454797065121c0a" .
            "185350454543485f4556454e545f554e5350454349464945441000121b0a" .
            "17454e445f4f465f53494e474c455f5554544552414e4345100122f4010a" .
            "1a53747265616d696e675265636f676e6974696f6e526573756c7412510a" .
            "0c616c7465726e61746976657318012003280b323b2e676f6f676c652e63" .
            "6c6f75642e7370656563682e7631703162657461312e5370656563685265" .
            "636f676e6974696f6e416c7465726e617469766512100a0869735f66696e" .
            "616c18022001280812110a0973746162696c69747918032001280212320a" .
            "0f726573756c745f656e645f74696d6518042001280b32192e676f6f676c" .
            "652e70726f746f6275662e4475726174696f6e12130a0b6368616e6e656c" .
            "5f74616718052001280512150a0d6c616e67756167655f636f6465180620" .
            "0128092298010a175370656563685265636f676e6974696f6e526573756c" .
            "7412510a0c616c7465726e61746976657318012003280b323b2e676f6f67" .
            "6c652e636c6f75642e7370656563682e7631703162657461312e53706565" .
            "63685265636f676e6974696f6e416c7465726e617469766512130a0b6368" .
            "616e6e656c5f74616718022001280512150a0d6c616e67756167655f636f" .
            "6465180520012809227e0a1c5370656563685265636f676e6974696f6e41" .
            "6c7465726e617469766512120a0a7472616e736372697074180120012809" .
            "12120a0a636f6e666964656e636518022001280212360a05776f72647318" .
            "032003280b32272e676f6f676c652e636c6f75642e7370656563682e7631" .
            "703162657461312e576f7264496e666f229d010a08576f7264496e666f12" .
            "2d0a0a73746172745f74696d6518012001280b32192e676f6f676c652e70" .
            "726f746f6275662e4475726174696f6e122b0a08656e645f74696d651802" .
            "2001280b32192e676f6f676c652e70726f746f6275662e4475726174696f" .
            "6e120c0a04776f726418032001280912120a0a636f6e666964656e636518" .
            "042001280212130a0b737065616b65725f74616718052001280532da030a" .
            "065370656563681296010a095265636f676e697a65122f2e676f6f676c65" .
            "2e636c6f75642e7370656563682e7631703162657461312e5265636f676e" .
            "697a65526571756573741a302e676f6f676c652e636c6f75642e73706565" .
            "63682e7631703162657461312e5265636f676e697a65526573706f6e7365" .
            "222682d3e4930220221b2f7631703162657461312f7370656563683a7265" .
            "636f676e697a653a012a12a4010a144c6f6e6752756e6e696e675265636f" .
            "676e697a65123a2e676f6f676c652e636c6f75642e7370656563682e7631" .
            "703162657461312e4c6f6e6752756e6e696e675265636f676e697a655265" .
            "71756573741a1d2e676f6f676c652e6c6f6e6772756e6e696e672e4f7065" .
            "726174696f6e223182d3e493022b22262f7631703162657461312f737065" .
            "6563683a6c6f6e6772756e6e696e677265636f676e697a653a012a128f01" .
            "0a1253747265616d696e675265636f676e697a6512382e676f6f676c652e" .
            "636c6f75642e7370656563682e7631703162657461312e53747265616d69" .
            "6e675265636f676e697a65526571756573741a392e676f6f676c652e636c" .
            "6f75642e7370656563682e7631703162657461312e53747265616d696e67" .
            "5265636f676e697a65526573706f6e7365220028013001427a0a21636f6d" .
            "2e676f6f676c652e636c6f75642e7370656563682e763170316265746131" .
            "420b53706565636850726f746f50015a43676f6f676c652e676f6c616e67" .
            "2e6f72672f67656e70726f746f2f676f6f676c65617069732f636c6f7564" .
            "2f7370656563682f7631703162657461313b737065656368f80101620670" .
            "726f746f33"
        ), true);

        static::$is_initialized = true;
    }
}
