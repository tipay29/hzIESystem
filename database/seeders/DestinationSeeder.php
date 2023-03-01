<?php

namespace Database\Seeders;

use App\Models\Destination;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DestinationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $destinations = [
            [
                'customer_name' => 'D040 VF Prague One DC (CZ)',
                'destination' => 'Czech捷克',
            ] ,
            [
                'customer_name' => 'DKSHO VF China Limited (VFS Shanghai)',
                'destination' => 'China中国',
            ] ,
            [
                'customer_name' => 'D050S VF ABX (BE)',
                'destination' => 'Belgium比利时',
            ] ,
            [
                'customer_name' => 'D050 VF ABX (BE)',
                'destination' => 'Belgium比利时',
            ] ,
            [
                'customer_name' => 'D05047 VF ISRAEL LTD',
                'destination' => 'Israel以色列',
            ] ,
            [
                'customer_name' => 'D05171 ITOCHU CORPORATION',
                'destination' => 'Japan日本',
            ] ,
            [
                'customer_name' => 'D05178 LEENOS CORP.',
                'destination' => 'South Korea韩国',
            ] ,
            [
                'customer_name' => 'D05184 COSIMO FRANCE/GO SPORT',
                'destination' => 'France法国',
            ] ,
            [
                'customer_name' => 'D05190 DHL SUPPLY CHAIN',
                'destination' => 'France法国',
            ] ,
            [
                'customer_name' => '1001 VISALIA DC',
                'destination' => 'USA美国',
            ] ,
            [
                'customer_name' => 'D05168 ITOCHU LOGISTICS CORP',
                'destination' => 'Japan日本',
            ] ,
            [
                'customer_name' => '1004 BRAMPTON DC',
                'destination' => 'Canada加拿大',
            ] ,
            [
                'customer_name' => '1009 Dropship US',
                'destination' => 'USA美国',
            ] ,
            [
                'customer_name' => 'JSDEN JANSPORT - VF DENVER WAREHOUSE',
                'destination' => 'USA美国',
            ] ,
            [
                'customer_name' => '1010 Dropship International',
                'destination' => '',
            ] ,
            [
                'customer_name' => 'JSRIF RIF Europe B.V. Rozenburg (Noo)',
                'destination' => 'Holland荷兰',
            ] ,
            [
                'customer_name' => 'DPHS iHeart Studio',
                'destination' => 'Hong Kong香港',
            ] ,
            [
                'customer_name' => 'KPLCNS VF China Limited',
                'destination' => 'China中国',
            ] ,
            [
                'customer_name' => 'KPLTWS VF Brands Taiwan Limited',
                'destination' => 'Taiwan台湾',
            ] ,
            [
                'customer_name' => 'W001 LF Logistics HK Limited',
                'destination' => 'Hong Kong香港',
            ] ,
            [
                'customer_name' => 'W002 HK Virtual DC',
                'destination' => '',
            ] ,
            [
                'customer_name' => 'W00570 LF Logistics (Taiwan) LTD.',
                'destination' => 'Taiwan台湾',
            ] ,
            [
                'customer_name' => 'D05045 ONCE CERO CUATRO S.A. D',
                'destination' => 'Mexico墨西哥',
            ] ,
            [
                'customer_name' => 'D05052 OFIEL LTD',
                'destination' => '',
            ] ,
            [
                'customer_name' => 'D05053 ONCE CERO QUATRO',
                'destination' => 'Mexico墨西哥',
            ] ,
            [
                'customer_name' => 'D05109 COMERCIAL ASTE DE IMPOR',
                'destination' => 'Brazil巴西',
            ] ,
            [
                'customer_name' => 'D05181 KOMAX S.A.',
                'destination' => 'Chile智利',
            ] ,
            [
                'customer_name' => 'D05191 JASHANMAL NATIONAL COMP',
                'destination' => 'Argentina阿根廷',
            ] ,
            [
                'customer_name' => 'DPXY TRUE ALLIANCE BRANDS PTY LTD',
                'destination' => 'Australia澳大利亚',
            ] ,
            [
                'customer_name' => 'KPLHKS VF Hong Kong Limited',
                'destination' => 'Hong Kong香港',
            ] ,
            [
                'customer_name' => 'KPLJPS L AND S CORPORATION',
                'destination' => 'Japan日本',
            ] ,
            [
                'customer_name' => 'KPLKRS LEENOS CORP.',
                'destination' => 'South Korea韩国',
            ] ,
            [
                'customer_name' => 'KPLPHS GREYHOUND MARKETING CORP',
                'destination' => '',
            ] ,
            [
                'customer_name' => 'KPLSGS VF BRANDS PTE LTD',
                'destination' => '',
            ] ,
            [
                'customer_name' => 'KPLTHS MANEEYA CONCEPTS CO., LTD',
                'destination' => '',
            ] ,
            [
                'customer_name' => 'OSHPC VF China Ltd-SHA office-Product',
                'destination' => 'China中国',
            ] ,
            [
                'customer_name' => 'W00410 KunShan CDC',
                'destination' => 'China中国',
            ] ,
            [
                'customer_name' => 'W00560 LF Logistics Services Pte Ltd',
                'destination' => 'Singapore新加坡',
            ] ,
            [
                'customer_name' => 'W601 LF Logistics Services Pte Ltd',
                'destination' => 'Singapore新加坡',
            ] ,
            [
                'customer_name' => 'W602 VFSOS Virtual DC for Dropship',
                'destination' => '',
            ] ,
            [
                'customer_name' => 'W60501 Maersk Contract Logistics (Hong Kong) Limited',
                'destination' => 'Hong Kong香港',
            ] ,
            [
                'customer_name' => 'W60510 KunShan CDC',
                'destination' => 'China中国',
            ] ,
            [
                'customer_name' => 'W60570 Maersk Contract Logistics (Taiwan) Limited, Taiwan Branch',
                'destination' => 'Taiwan台湾',
            ] ,
            [
                'customer_name' => '1005 VF OUTDOOR MEXICO S.de R.',
                'destination' => 'Mexico墨西哥',
            ] ,
            [
                'customer_name' => '1013 Dropship MX',
                'destination' => 'Mexico墨西哥',
            ] ,
            [
                'customer_name' => '1014 Dropship CA',
                'destination' => 'Canada加拿大',
            ] ,
            [
                'customer_name' => '1020 Jonestown DC',
                'destination' => 'USA美国',
            ] ,
            [
                'customer_name' => 'C05060 JD SPORTS FASHION PLC',
                'destination' => '',
            ] ,
            [
                'customer_name' => 'D00079 VF ISRAEL LTD',
                'destination' => 'Israel以色列',
            ] ,
            [
                'customer_name' => 'D05018 SUN AND SAND SPORTS LLC',
                'destination' => 'UAE,Dubai阿联酋,迪拜',
            ] ,
            [
                'customer_name' => 'D05019 ALI ABDULWAHAB AL-MUTAW',
                'destination' => 'Kuwait科威特',
            ] ,
            [
                'customer_name' => 'D060 VF EDC (BE)',
                'destination' => 'Belgium比利时',
            ] ,
            [
                'customer_name' => 'D060S VF EDC (BE)',
                'destination' => 'Belgium比利时',
            ] ,
            [
                'customer_name' => 'D080 VF Northern Europe',
                'destination' => 'UK联合王国',
            ] ,
            [
                'customer_name' => 'NFCPS Chicago Photo Studio',
                'destination' => 'USA美国',
            ] ,
            [
                'customer_name' => 'OSACS SECTOR APPAREL CC',
                'destination' => 'South Africa南非',
            ] ,
            [
                'customer_name' => 'OTALN NEW ZEALAND',
                'destination' => 'New Zealand新西兰',
            ] ,
            [
                'customer_name' => 'OTALN TRUE ALLIANCE (NZ) LTD',
                'destination' => 'New Zealand新西兰',
            ] ,
            [
                'customer_name' => 'OVFHH VF HONG KONG LTD',
                'destination' => 'Hong Kong香港',
            ] ,
            [
                'customer_name' => 'OVFMH VF HK Ltd - Marketing',
                'destination' => 'Hong Kong香港',
            ] ,
            [
                'customer_name' => 'SHMKT VF China Ltd-SHA office-Market',
                'destination' => 'China中国',
            ] ,
            [
                'customer_name' => 'T909 GOLDWIN JAPAN - JAPAN',
                'destination' => 'Japan日本',
            ] ,
            [
                'customer_name' => 'T910 GOLDWIN KOREA - KOREA',
                'destination' => 'South Korea韩国',
            ] ,
            [
                'customer_name' => 'T915 UNIGLOBE',
                'destination' => 'Japan日本',
            ] ,
            [
                'customer_name' => 'T948 TRUE ALLIANCE BRANDS PTY LTD',
                'destination' => 'Australia澳大利亚',
            ] ,
            [
                'customer_name' => 'T948 VANTAGE POINT',
                'destination' => 'Australia澳大利亚',
            ] ,
            [
                'customer_name' => 'T963 OUTDOOR VENTURE - SINGAPORE',
                'destination' => 'Singapore新加坡',
            ] ,
            [
                'customer_name' => 'T970 VF APPAREL (SZ) LTD-SHA',
                'destination' => 'Shanghai上海',
            ] ,
            [
                'customer_name' => 'T9A8 Goldwin Japan (Apparel)',
                'destination' => 'Japan日本',
            ] ,
            [
                'customer_name' => 'TFUSD TNF FTW US sample - Denver',
                'destination' => 'USA美国',
            ] ,
            [
                'customer_name' => 'UESH UE Shanghai Marketing',
                'destination' => 'China中国',
            ] ,
            [
                'customer_name' => 'VFTW VF Brands Taiwan Limited',
                'destination' => 'Taiwan台湾',
            ] ,
            [
                'customer_name' => 'T007 LF Logistics (Taiwan) LTD.',
                'destination' => 'Taiwan台湾',
            ] ,
            [
                'customer_name' => 'T953 LF Logistics HK Limited',
                'destination' => 'Hong Kong香港',
            ] ,
            [
                'customer_name' => 'D040S VF Prague One DC (CZ)',
                'destination' => 'Czech捷克',
            ] ,
            [
                'customer_name' => '25 VANS HK OFFICE STORE',
                'destination' => 'Hong Kong香港',
            ] ,
            [
                'customer_name' => '50 VF Korea Ltd. (office store)',
                'destination' => 'South Korea韩国',
            ] ,
            [
                'customer_name' => '1002 SANTA FE SPRINGS DC',
                'destination' => 'USA美国',
            ] ,
            [
                'customer_name' => 'C00159 PLATAFORMA JUNDIZ',
                'destination' => 'Spain西班牙',
            ] ,
            [
                'customer_name' => 'D00028 SUN AND SAND SPORTS LLC',
                'destination' => 'UAE,Dubai阿联酋,迪拜',
            ] ,
            [
                'customer_name' => 'D00045 VF ISRAEL LTD',
                'destination' => 'Israel以色列',
            ] ,
            [
                'customer_name' => 'D010 VF Prague DC CZ',
                'destination' => 'Czech捷克',
            ] ,
            [
                'customer_name' => 'D010S VF Prague DC CZ',
                'destination' => 'Czech捷克',
            ] ,
            [
                'customer_name' => 'ORTLA Reviva Technology (Pty) Ltd.',
                'destination' => 'South Africa南非',
            ] ,
            [
                'customer_name' => 'OVMOM VF Malaysia Office',
                'destination' => 'Malaysia马来西亚',
            ] ,
            [
                'customer_name' => 'VNSGP LF Logistics Services Pte Ltd',
                'destination' => 'Singapore新加坡',
            ] ,
            [
                'customer_name' => 'W001 Maersk Contract Logistics (Hong Kong) Limited',
                'destination' => 'Hong Kong香港',
            ] ,
            [
                'customer_name' => 'W100 Kunshan Central DC',
                'destination' => 'China中国',
            ] ,
            [
                'customer_name' => 'W300 Korea DC',
                'destination' => 'South Korea韩国',
            ] ,
            [
                'customer_name' => 'W500 Malaysia DC',
                'destination' => 'Malaysia马来西亚',
            ] ,
            [
                'customer_name' => 'W601 Singapore DC',
                'destination' => 'Singapore新加坡',
            ] ,
            [
                'customer_name' => 'W60530 Korea DC',
                'destination' => 'South Korea韩国',
            ] ,
            [
                'customer_name' => 'W60550 LF LOGISTICS SERVICES (M) SDN',
                'destination' => 'Malaysia马来西亚',
            ] ,
            [
                'customer_name' => 'W60572 Taiwan Virtual DC',
                'destination' => '',
            ] ,
            [
                'customer_name' => 'W700 LF Logistics (Taiwan) LTD.',
                'destination' => 'Taiwan台湾',
            ] ,
            [
                'customer_name' => 'W60570  Maersk Contract Logistics (Taiwan) Limited, Taiwan Branch',
                'destination' => 'Taiwan台湾',
            ] ,
            [
                'customer_name' => 'Hamburg Hamburg',
                'destination' => 'German德国',
            ] ,
            [
                'customer_name' => 'SH ShangHai',
                'destination' => 'Shanghai上海',
            ] ,
            [
                'customer_name' => 'US USA',
                'destination' => 'USA美国',
            ] ,
            [
                'customer_name' => 'RDD STABIO',
                'destination' => '',
            ] ,
            [
                'customer_name' => 'PHOTO VIA COUPA DIRECT TO STABIO EARLY SET 1 STABIO',
                'destination' => '',
            ] ,
            [
                'customer_name' => '1009 Academy Ltd #893 DC',
                'destination' => 'USA美国',
            ] ,
            [
                'customer_name' => '1009 Academy Ltd #895 DC',
                'destination' => 'USA美国',
            ] ,
            [
                'customer_name' => '1009 Academy Ltd #897 DC',
                'destination' => 'USA美国',
            ] ,
            [
                'customer_name' => '1009 Kohls Department Stores',
                'destination' => 'USA美国 ',
            ] ,
            [
                'customer_name' => '1009 J C Penney Co #9465-6',
                'destination' => 'USA美国',
            ] ,
            [
                'customer_name' => '1009 ROSS STORES INC',
                'destination' => 'USA美国',
            ] ,
            [
                'customer_name' => '1009 DSG #51',
                'destination' => 'USA美国',
            ] ,
            [
                'customer_name' => '1009 DSG #351',
                'destination' => 'USA美国',
            ] ,
            [
                'customer_name' => '1009 DSG #651',
                'destination' => 'USA美国',
            ] ,
            [
                'customer_name' => '1009 DSG #851',
                'destination' => 'USA美国',
            ] ,
            [
                'customer_name' => '1009 DSG #1051',
                'destination' => 'USA美国',
            ] ,
            [
                'customer_name' => '1009 DSG #1142',
                'destination' => 'USA美国',
            ] ,
            [
                'customer_name' => '1009 DSG #1012',
                'destination' => 'USA美国',
            ] ,
            [
                'customer_name' => '1009 San Mar Corporation',
                'destination' => 'USA美国',
            ] ,
            [
                'customer_name' => '1009 SUPREME',
                'destination' => 'USA美国',
            ] ,
            [
                'customer_name' => '1009 SMITH SPORTS OPTICS INC',
                'destination' => 'USA美国',
            ] ,
            [
                'customer_name' => '1009 REI BEDFORD DC',
                'destination' => 'USA美国',
            ] ,
            [
                'customer_name' => '1009 REI DC SUMNER WA',
                'destination' => 'USA美国',
            ] ,
            [
                'customer_name' => '1009 REI GOODYEAR DC',
                'destination' => 'USA美国',
            ] ,
            [
                'customer_name' => '1009 FGL SPORTS',
                'destination' => 'Canada加拿大',
            ] ,
            [
                'customer_name' => '1009 JDSF RETAIL CANADA INC',
                'destination' => 'Canada加拿大',
            ] ,
            [
                'customer_name' => '1010 BLU LOGISTICS',
                'destination' => 'Panama巴拿马',
            ] ,
            [
                'customer_name' => '1010 SUPREME OVERSEAS CORP',
                'destination' => 'Panama巴拿马',
            ] ,
            [
                'customer_name' => '1010 LOGISTIS SOLUTIONS SA DE CV',
                'destination' => 'El Salvador萨尔瓦多',
            ] ,
            [
                'customer_name' => '1010 KOMAX SA',
                'destination' => 'Chile智利',
            ] ,
            [
                'customer_name' => '1010 SISTEMAS AEREOS SA DE CV',
                'destination' => 'El Salvador萨尔瓦多',
            ] ,
            [
                'customer_name' => '1010 KOMAX PERU SAC',
                'destination' => 'Peru秘鲁',
            ] ,
            [
                'customer_name' => '1010 JUST US S A',
                'destination' => 'Argentina阿根廷',
            ] ,
            [
                'customer_name' => '1010 GRIMOLDI SA',
                'destination' => 'Argentina阿根廷',
            ] ,
            [
                'customer_name' => '1010 TNF COMERCIAL E IMPORTADORA LTDA',
                'destination' => 'Brazil巴西',
            ] ,
            [
                'customer_name' => 'W002 True Alliance Brands Pty Ltd.',
                'destination' => 'Australia澳大利亚',
            ] ,
            [
                'customer_name' => 'W002 UNIGLOBE TRAVELWARE CO., INC',
                'destination' => 'Philippines菲律宾',
            ] ,
            [
                'customer_name' => 'W002 Primer Kenrich SDN. BHD (611792-M)',
                'destination' => 'Malaysia马来西亚',
            ] ,
            [
                'customer_name' => 'W002 THAI OUTDOOR SPORT CO LTD',
                'destination' => 'Thailand泰国',
            ] ,
            [
                'customer_name' => 'W002 ACCENT FOOTWEAR LIMITED',
                'destination' => 'New Zealand新西兰',
            ] ,
            [
                'customer_name' => 'W002 ACCENT GROUP PTY LTD',
                'destination' => 'New Zealand新西兰',
            ] ,
            [
                'customer_name' => '1010 ACCUR8 DISTRIBUTION INC',
                'destination' => 'Panama巴拿马',
            ] ,
            [
                'customer_name' => '1010 FORUS SA',
                'destination' => 'Chile智利',
            ] ,
            [
                'customer_name' => '1010 SERTRADING BR LTDA',
                'destination' => 'Brazil巴西',
            ] ,
            [
                'customer_name' => '1010 GRIMURU S.A.',
                'destination' => 'Uruguay乌拉圭',
            ] ,

        ];

        foreach($destinations as $destination){
            Destination::create($destination);
        }
    }
}
