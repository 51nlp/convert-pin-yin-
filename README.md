# convertPinYin
> PHP中文拼音转换类(this a chinese characters convert chinese pinyin class base on php)

#功能描述
> 该类可以将UTF-8,GB2312,GBK,BIG5.GB18300中文编码格式的中文单字拼音码转换，该类转换字典采用UNICODE标准（共25961字，
> 包含20902个基本汉字+5059生僻字）,Unicode范围:0x4e00-0x9fa5,0x3400-0x4db5。

#性能说明
> 经过测试，该类转换速度可以达到:4000字/s

#调用代码：
###基本使用
```php

\Utils\PinYin::getPinYin($data, 'string', true);

```

###结果分隔
```php

\Utils\PinYin::getPinYin($data, 'string', true);

```

###结果指定分隔
```php

\Utils\PinYin::getPinYin($data, 'string', true, ',');

```

###结果数组返回值
```php

\Utils\PinYin::getPinYin($data, 'array')

```

#演示样本
> 本次测试数据如下:
> 这是一个符合UTF-8标准拼音转换类，使用PHP编写（共25961字，包含20902个基本汉字+5059生僻字）一起开始数：12345开始测试生僻字:
> 㐀㐁㐄㐅㐆㐌㐖㐜
>
> 演示程序执行结果如下：
>
###基本使用:
```php
zheshiyigefuheUTF8biaozhunpinyinzhuanhuanleishiyongPHPbianxiegong25961zibaohan20902gejibenhanzi5059shengpiziyiqikaishishu12345kaishiceshishengpiziqiutiankuawuyinsiyechou
```

###结果分隔:
```PHP
zhe_shi_yi_ge_fu_he_U_T_F__8_biao_zhun_pin_yin_zhuan_huan_lei__shi_yong_P_H_P_bian_xie__gong_2_5_9_6_1_zi__bao_han_2_0_9_0_2_ge_ji_ben_han_zi__5_0_5_9_sheng_pi_zi__yi_qi_kai_shi_shu__1_2_3_4_5_kai_shi_ce_shi_sheng_pi_zi__qiu_tian_kua_wu_yin_si_ye_chou
```

###结果指定分隔:
```PHP
zhe,shi,yi,ge,fu,he,U,T,F,,8,biao,zhun,pin,yin,zhuan,huan,lei,,shi,yong,P,H,P,bian,xie,,gong,2,5,9,6,1,zi,,bao,han,2,0,9,0,2,ge,ji,ben,han,zi,,5,0,5,9,sheng,pi,zi,,yi,qi,kai,shi,shu,,1,2,3,4,5,kai,shi,ce,shi,sheng,pi,zi,,qiu,tian,kua,wu,yin,si,ye,chou
```

###结果数组返回值:
```PHP
Array ( [0] => zhe [1] => shi [2] => yi [3] => ge [4] => fu [5] => he [6] => U [7] => T [8] => F [9] => [10] => 8 [11] => biao [12] => zhun [13] => pin [14] => yin [15] => zhuan [16] => huan [17] => lei [18] => [19] => shi [20] => yong [21] => P [22] => H [23] => P [24] => bian [25] => xie [26] => [27] => gong [28] => 2 [29] => 5 [30] => 9 [31] => 6 [32] => 1 [33] => zi [34] => [35] => bao [36] => han [37] => 2 [38] => 0 [39] => 9 [40] => 0 [41] => 2 [42] => ge [43] => ji [44] => ben [45] => han [46] => zi [47] => [48] => 5 [49] => 0 [50] => 5 [51] => 9 [52] => sheng [53] => pi [54] => zi [55] => [56] => yi [57] => qi [58] => kai [59] => shi [60] => shu [61] => [62] => 1 [63] => 2 [64] => 3 [65] => 4 [66] => 5 [67] => kai [68] => shi [69] => ce [70] => shi [71] => sheng [72] => pi [73] => zi [74] => [75] => qiu [76] => tian [77] => kua [78] => wu [79] => yin [80] => si [81] => ye [82] => chou )
```
