# See http://en.wikipedia.org/wiki/Social_Security_number#Structure

areas_groups_map = {
    1: 8,
    2: 6,
    3: 6,
    4: 11,
    5: 8,
    6: 8,
    7: 8,
    8: 92,
    9: 90,
    10: 92,
    11: 92,
    12: 92,
    13: 92,
    14: 92,
    15: 92,
    16: 92,
    17: 92,
    18: 92,
    19: 90,
    20: 90,
    21: 90,
    22: 90,
    23: 90,
    24: 90,
    25: 90,
    26: 90,
    27: 90,
    28: 90,
    29: 90,
    30: 90,
    31: 90,
    32: 90,
    33: 90,
    34: 90,
    35: 74,
    36: 72,
    37: 72,
    38: 72,
    39: 72,
    40: 13,
    41: 13,
    42: 13,
    43: 13,
    44: 13,
    45: 13,
    46: 11,
    47: 11,
    48: 11,
    49: 11,
    50: 98,
    51: 98,
    52: 98,
    53: 98,
    54: 98,
    55: 98,
    56: 98,
    57: 98,
    58: 98,
    59: 98,
    60: 98,
    61: 98,
    62: 98,
    63: 98,
    64: 98,
    65: 98,
    66: 98,
    67: 98,
    68: 98,
    69: 98,
    70: 98,
    71: 98,
    72: 98,
    73: 98,
    74: 98,
    75: 98,
    76: 98,
    77: 98,
    78: 98,
    79: 98,
    80: 98,
    81: 98,
    82: 98,
    83: 98,
    84: 96,
    85: 96,
    86: 96,
    87: 96,
    88: 96,
    89: 96,
    90: 96,
    91: 96,
    92: 96,
    93: 96,
    94: 96,
    95: 96,
    96: 96,
    97: 96,
    98: 96,
    99: 96,
    100: 96,
    101: 96,
    102: 96,
    103: 96,
    104: 96,
    105: 96,
    106: 96,
    107: 96,
    108: 96,
    109: 96,
    110: 96,
    111: 96,
    112: 96,
    113: 96,
    114: 96,
    115: 96,
    116: 96,
    117: 96,
    118: 96,
    119: 96,
    120: 96,
    121: 96,
    122: 96,
    123: 96,
    124: 96,
    125: 96,
    126: 96,
    127: 96,
    128: 96,
    129: 96,
    130: 96,
    131: 96,
    132: 96,
    133: 96,
    134: 96,
    135: 21,
    136: 21,
    137: 21,
    138: 21,
    139: 21,
    140: 21,
    141: 21,
    142: 21,
    143: 21,
    144: 19,
    145: 19,
    146: 19,
    147: 19,
    148: 19,
    149: 19,
    150: 19,
    151: 19,
    152: 19,
    153: 19,
    154: 19,
    155: 19,
    156: 19,
    157: 19,
    158: 19,
    159: 84,
    160: 84,
    161: 84,
    162: 84,
    163: 84,
    164: 84,
    165: 84,
    166: 84,
    167: 84,
    168: 84,
    169: 84,
    170: 84,
    171: 84,
    172: 84,
    173: 84,
    174: 84,
    175: 84,
    176: 84,
    177: 84,
    178: 84,
    179: 84,
    180: 84,
    181: 84,
    182: 84,
    183: 84,
    184: 84,
    185: 84,
    186: 84,
    187: 84,
    188: 84,
    189: 84,
    190: 84,
    191: 84,
    192: 84,
    193: 84,
    194: 84,
    195: 84,
    196: 84,
    197: 84,
    198: 84,
    199: 84,
    200: 84,
    201: 84,
    202: 84,
    203: 84,
    204: 84,
    205: 82,
    206: 82,
    207: 82,
    208: 82,
    209: 82,
    210: 82,
    211: 82,
    212: 83,
    213: 83,
    214: 83,
    215: 83,
    216: 83,
    217: 83,
    218: 81,
    219: 81,
    220: 81,
    221: 8,
    222: 6,
    223: 99,
    224: 99,
    225: 99,
    226: 99,
    227: 99,
    228: 99,
    229: 99,
    230: 99,
    231: 99,
    232: 55,
    233: 55,
    234: 55,
    235: 53,
    236: 53,
    237: 99,
    238: 99,
    239: 99,
    240: 99,
    241: 99,
    242: 99,
    243: 99,
    244: 99,
    245: 99,
    246: 99,
    247: 99,
    248: 99,
    249: 99,
    250: 99,
    251: 99,
    252: 99,
    253: 99,
    254: 99,
    255: 99,
    256: 99,
    257: 99,
    258: 99,
    259: 99,
    260: 99,
    261: 99,
    262: 99,
    263: 99,
    264: 99,
    265: 99,
    266: 99,
    267: 99,
    268: 15,
    269: 15,
    270: 15,
    271: 15,
    272: 15,
    273: 15,
    274: 13,
    275: 13,
    276: 13,
    277: 13,
    278: 13,
    279: 13,
    280: 13,
    281: 13,
    282: 13,
    283: 13,
    284: 13,
    285: 13,
    286: 13,
    287: 13,
    288: 13,
    289: 13,
    290: 13,
    291: 13,
    292: 13,
    293: 13,
    294: 13,
    295: 13,
    296: 13,
    297: 13,
    298: 13,
    299: 13,
    300: 13,
    301: 13,
    302: 13,
    303: 33,
    304: 33,
    305: 33,
    306: 33,
    307: 33,
    308: 33,
    309: 33,
    310: 33,
    311: 33,
    312: 33,
    313: 33,
    314: 33,
    315: 33,
    316: 33,
    317: 31,
    318: 8,
    319: 8,
    320: 8,
    321: 8,
    322: 8,
    323: 8,
    324: 8,
    325: 8,
    326: 8,
    327: 8,
    328: 8,
    329: 8,
    330: 8,
    331: 8,
    332: 8,
    333: 8,
    334: 8,
    335: 8,
    336: 6,
    337: 6,
    338: 6,
    339: 6,
    340: 6,
    341: 6,
    342: 6,
    343: 6,
    344: 6,
    345: 6,
    346: 6,
    347: 6,
    348: 6,
    349: 6,
    350: 6,
    351: 6,
    352: 6,
    353: 6,
    354: 6,
    355: 6,
    356: 6,
    357: 6,
    358: 6,
    359: 6,
    360: 6,
    361: 6,
    362: 35,
    363: 35,
    364: 35,
    365: 35,
    366: 35,
    367: 35,
    368: 35,
    369: 35,
    370: 35,
    371: 35,
    372: 35,
    373: 35,
    374: 35,
    375: 35,
    376: 35,
    377: 35,
    378: 35,
    379: 35,
    380: 35,
    381: 35,
    382: 35,
    383: 35,
    384: 35,
    385: 33,
    386: 33,
    387: 31,
    388: 31,
    389: 31,
    390: 31,
    391: 31,
    392: 29,
    393: 29,
    394: 29,
    395: 29,
    396: 29,
    397: 29,
    398: 29,
    399: 29,
    400: 69,
    401: 69,
    402: 69,
    403: 69,
    404: 69,
    405: 69,
    406: 69,
    407: 69,
    408: 99,
    409: 99,
    410: 99,
    411: 99,
    412: 99,
    413: 99,
    414: 99,
    415: 99,
    416: 65,
    417: 63,
    418: 63,
    419: 63,
    420: 63,
    421: 63,
    422: 63,
    423: 63,
    424: 63,
    425: 99,
    426: 99,
    427: 99,
    428: 99,
    429: 99,
    430: 99,
    431: 99,
    432: 99,
    433: 99,
    434: 99,
    435: 99,
    436: 99,
    437: 99,
    438: 99,
    439: 99,
    440: 25,
    441: 25,
    442: 25,
    443: 25,
    444: 25,
    445: 25,
    446: 23,
    447: 23,
    448: 23,
    449: 99,
    450: 99,
    451: 99,
    452: 99,
    453: 99,
    454: 99,
    455: 99,
    456: 99,
    457: 99,
    458: 99,
    459: 99,
    460: 99,
    461: 99,
    462: 99,
    463: 99,
    464: 99,
    465: 99,
    466: 99,
    467: 99,
    468: 53,
    469: 53,
    470: 53,
    471: 53,
    472: 51,
    473: 51,
    474: 51,
    475: 51,
    476: 51,
    477: 51,
    478: 39,
    479: 39,
    480: 39,
    481: 39,
    482: 39,
    483: 37,
    484: 37,
    485: 37,
    486: 27,
    487: 27,
    488: 27,
    489: 27,
    490: 27,
    491: 27,
    492: 27,
    493: 27,
    494: 25,
    495: 25,
    496: 25,
    497: 25,
    498: 25,
    499: 25,
    500: 25,
    501: 35,
    502: 33,
    503: 43,
    504: 41,
    505: 55,
    506: 53,
    507: 53,
    508: 53,
    509: 29,
    510: 29,
    511: 29,
    512: 29,
    513: 29,
    514: 29,
    515: 27,
    516: 47,
    517: 45,
    518: 81,
    519: 81,
    520: 57,
    521: 99,
    522: 99,
    523: 99,
    524: 99,
    525: 99,
    526: 99,
    527: 99,
    528: 99,
    529: 99,
    530: 99,
    531: 65,
    532: 65,
    533: 65,
    534: 65,
    535: 65,
    536: 65,
    537: 65,
    538: 63,
    539: 63,
    540: 77,
    541: 77,
    542: 77,
    543: 75,
    544: 75,
    545: 99,
    546: 99,
    547: 99,
    548: 99,
    549: 99,
    550: 99,
    551: 99,
    552: 99,
    553: 99,
    554: 99,
    555: 99,
    556: 99,
    557: 99,
    558: 99,
    559: 99,
    560: 99,
    561: 99,
    562: 99,
    563: 99,
    564: 99,
    565: 99,
    566: 99,
    567: 99,
    568: 99,
    569: 99,
    570: 99,
    571: 99,
    572: 99,
    573: 99,
    574: 53,
    575: 99,
    576: 99,
    577: 47,
    578: 47,
    579: 47,
    580: 39,
    581: 99,
    582: 99,
    583: 99,
    584: 99,
    585: 99,
    586: 63,
    587: 99,
    588: 5,
    589: 99,
    590: 99,
    591: 99,
    592: 99,
    593: 99,
    594: 99,
    595: 99,
    596: 88,
    597: 86,
    598: 86,
    599: 86,
    600: 99,
    601: 99,
    602: 73,
    603: 73,
    604: 73,
    605: 73,
    606: 73,
    607: 73,
    608: 73,
    609: 73,
    610: 73,
    611: 73,
    612: 73,
    613: 73,
    614: 73,
    615: 73,
    616: 73,
    617: 73,
    618: 73,
    619: 73,
    620: 73,
    621: 71,
    622: 71,
    623: 71,
    624: 71,
    625: 71,
    626: 71,
    627: 19,
    628: 19,
    629: 19,
    630: 17,
    631: 17,
    632: 17,
    633: 17,
    634: 17,
    635: 17,
    636: 17,
    637: 17,
    638: 17,
    639: 17,
    640: 17,
    641: 17,
    642: 17,
    643: 17,
    644: 17,
    645: 17,
    646: 6,
    647: 6,
    648: 50,
    649: 48,
    650: 52,
    651: 52,
    652: 50,
    653: 50,
    654: 30,
    655: 30,
    656: 30,
    657: 30,
    658: 30,
    659: 18,
    660: 18,
    661: 18,
    662: 18,
    663: 18,
    664: 16,
    665: 16,
    667: 40,
    668: 40,
    669: 40,
    670: 40,
    671: 40,
    672: 38,
    673: 38,
    674: 38,
    675: 38,
    676: 16,
    677: 16,
    678: 16,
    679: 16,
    680: 8,
    681: 18,
    682: 18,
    683: 16,
    684: 16,
    685: 16,
    686: 16,
    687: 16,
    688: 16,
    689: 16,
    690: 16,
    691: 10,
    692: 10,
    693: 10,
    694: 10,
    695: 10,
    696: 10,
    697: 10,
    698: 10,
    699: 9,
    700: 18,
    701: 18,
    702: 18,
    703: 18,
    704: 18,
    705: 18,
    706: 18,
    707: 18,
    708: 18,
    709: 18,
    710: 18,
    711: 18,
    712: 18,
    713: 18,
    714: 18,
    715: 18,
    716: 18,
    717: 18,
    718: 18,
    719: 18,
    720: 18,
    721: 18,
    722: 18,
    723: 18,
    724: 28,
    725: 18,
    726: 18,
    727: 10,
    728: 14,
    729: 16,
    730: 16,
    731: 16,
    732: 14,
    733: 14,
    750: 12,
    751: 12,
    752: 3,
    753: 3,
    754: 3,
    755: 3,
    756: 9,
    757: 7,
    758: 7,
    759: 7,
    760: 7,
    761: 7,
    762: 7,
    763: 7,
    764: 98,
    765: 98,
    766: 78,
    767: 78,
    768: 78,
    769: 76,
    770: 76,
    771: 76,
    772: 76}