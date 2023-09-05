<?php

namespace Database\Seeders;

use App\Models\Size;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SizeSeeder extends Seeder
{

    public function run()
    {
        $sizes = [
            [
                'size' => 'OS'
            ] ,
            [
                'size' => 'XXXXXS'
            ] ,
            [
                'size' => '5XS'
            ] ,
            [
                'size' => 'XXXXS'
            ] ,
            [
                'size' => '4XS'
            ] ,
            [
                'size' => 'XXXS'
            ] ,
            [
                'size' => '3XS'
            ] ,
            [
                'size' => 'XXS'
            ] ,
            [
                'size' => '2XS'
            ] ,
            [
                'size' => 'XS'
            ] ,
            [
                'size' => 'S'
            ] ,
            [
                'size' => 'M'
            ] ,
            [
                'size' => 'L'
            ] ,
            [
                'size' => 'XL'
            ] ,
            [
                'size' => 'XXL'
            ] ,
            [
                'size' => '2XL'
            ] ,
            [
                'size' => 'XXXL'
            ] ,
            [
                'size' => '3XL'
            ] ,
            [
                'size' => 'XXXXL'
            ] ,
            [
                'size' => '4XL'
            ] ,
            [
                'size' => 'XXXXXL'
            ] ,
            [
                'size' => '5XL'
            ] ,
            [
                'size' => 'XXS/XS'
            ] ,
            [
                'size' => 'XS/S'
            ] ,
            [
                'size' => 'S/M'
            ] ,
            [
                'size' => 'M/L'
            ] ,
            [
                'size' => 'L/XL'
            ] ,
            [
                'size' => 'XL/XXL'
            ] ,
            [
                'size' => 'XXL/XXXL'
            ] ,
            [
                'size' => 'XXXL/XXXXL'
            ] ,
            [
                'size' => 'XXXXL/XXXXXL'
            ] ,
            [
                'size' => '01'
            ] ,
            [
                'size' => '02'
            ] ,
            [
                'size' => '03'
            ] ,
            [
                'size' => '04'
            ] ,
            [
                'size' => '05'
            ] ,
            [
                'size' => '06'
            ] ,
            [
                'size' => '07'
            ] ,
            [
                'size' => '08'
            ] ,
            [
                'size' => '09'
            ] ,
            [
                'size' => '1'
            ] ,
            [
                'size' => '2'
            ] ,
            [
                'size' => '3'
            ] ,
            [
                'size' => '4'
            ] ,
            [
                'size' => '5'
            ] ,
            [
                'size' => '6'
            ] ,
            [
                'size' => '7'
            ] ,
            [
                'size' => '8'
            ] ,
            [
                'size' => '9'
            ] ,
            [
                'size' => '10'
            ] ,
            [
                'size' => '11'
            ] ,
            [
                'size' => '12'
            ] ,
            [
                'size' => '13'
            ] ,
            [
                'size' => '14'
            ] ,
            [
                'size' => '15'
            ] ,
            [
                'size' => '16'
            ] ,
            [
                'size' => '17'
            ] ,
            [
                'size' => '18'
            ] ,
            [
                'size' => '19'
            ] ,
            [
                'size' => '20'
            ] ,
            [
                'size' => '21'
            ] ,
            [
                'size' => '22'
            ] ,
            [
                'size' => '23'
            ] ,
            [
                'size' => '24'
            ] ,
            [
                'size' => '25'
            ] ,
            [
                'size' => '26'
            ] ,
            [
                'size' => '27'
            ] ,
            [
                'size' => '28'
            ] ,
            [
                'size' => '29'
            ] ,
            [
                'size' => '30'
            ] ,
            [
                'size' => '31'
            ] ,
            [
                'size' => '32'
            ] ,
            [
                'size' => '33'
            ] ,
            [
                'size' => '34'
            ] ,
            [
                'size' => '35'
            ] ,
            [
                'size' => '36'
            ] ,
            [
                'size' => '37'
            ] ,
            [
                'size' => '38'
            ] ,
            [
                'size' => '39'
            ] ,
            [
                'size' => '40'
            ] ,
            [
                'size' => 'XXXXXS-REG'
            ] ,
            [
                'size' => '5XS-REG'
            ] ,
            [
                'size' => 'XXXXS-REG'
            ] ,
            [
                'size' => '4XS-REG'
            ] ,
            [
                'size' => 'XXXS-REG'
            ] ,
            [
                'size' => '3XS-REG'
            ] ,
            [
                'size' => 'XXS-REG'
            ] ,
            [
                'size' => '2XS-REG'
            ] ,
            [
                'size' => 'XS-REG'
            ] ,
            [
                'size' => 'S-REG'
            ] ,
            [
                'size' => 'M-REG'
            ] ,
            [
                'size' => 'L-REG'
            ] ,
            [
                'size' => 'XL-REG'
            ] ,
            [
                'size' => 'XXL-REG'
            ] ,
            [
                'size' => '2XL-REG'
            ] ,
            [
                'size' => 'XXXL-REG'
            ] ,
            [
                'size' => '3XL-REG'
            ] ,
            [
                'size' => 'XXXXL-REG'
            ] ,
            [
                'size' => '4XL-REG'
            ] ,
            [
                'size' => 'XXXXXL-REG'
            ] ,
            [
                'size' => '5XL-REG'
            ] ,
            [
                'size' => 'XXS/XS-REG'
            ] ,
            [
                'size' => 'XS/S-REG'
            ] ,
            [
                'size' => 'S/M-REG'
            ] ,
            [
                'size' => 'M/L-REG'
            ] ,
            [
                'size' => 'L/XL-REG'
            ] ,
            [
                'size' => 'XL/XXL-REG'
            ] ,
            [
                'size' => 'XXL/XXXL-REG'
            ] ,
            [
                'size' => 'XXXL/XXXXL-REG'
            ] ,
            [
                'size' => 'XXXXL/XXXXXL-REG'
            ] ,
            [
                'size' => '28-REG'
            ] ,
            [
                'size' => '29-REG'
            ] ,
            [
                'size' => '30-REG'
            ] ,
            [
                'size' => '31-REG'
            ] ,
            [
                'size' => '32-REG'
            ] ,
            [
                'size' => '33-REG'
            ] ,
            [
                'size' => '34-REG'
            ] ,
            [
                'size' => '35-REG'
            ] ,
            [
                'size' => '36-REG'
            ] ,
            [
                'size' => '37-REG'
            ] ,
            [
                'size' => '38-REG'
            ] ,
            [
                'size' => '39-REG'
            ] ,
            [
                'size' => '40-REG'
            ] ,
            [
                'size' => 'XXXXXS-LNG'
            ] ,
            [
                'size' => '5XS-LNG'
            ] ,
            [
                'size' => 'XXXXS-LNG'
            ] ,
            [
                'size' => '4XS-LNG'
            ] ,
            [
                'size' => 'XXXS-LNG'
            ] ,
            [
                'size' => '3XS-LNG'
            ] ,
            [
                'size' => 'XXS-LNG'
            ] ,
            [
                'size' => '2XS-LNG'
            ] ,
            [
                'size' => 'XS-LNG'
            ] ,
            [
                'size' => 'S-LNG'
            ] ,
            [
                'size' => 'M-LNG'
            ] ,
            [
                'size' => 'L-LNG'
            ] ,
            [
                'size' => 'XL-LNG'
            ] ,
            [
                'size' => 'XXL-LNG'
            ] ,
            [
                'size' => '2XL-LNG'
            ] ,
            [
                'size' => 'XXXL-LNG'
            ] ,
            [
                'size' => '3XL-LNG'
            ] ,
            [
                'size' => 'XXXXL-LNG'
            ] ,
            [
                'size' => '4XL-LNG'
            ] ,
            [
                'size' => 'XXXXXL-LNG'
            ] ,
            [
                'size' => '5XL-LNG'
            ] ,
            [
                'size' => '28-LNG'
            ] ,
            [
                'size' => '29-LNG'
            ] ,
            [
                'size' => '30-LNG'
            ] ,
            [
                'size' => '31-LNG'
            ] ,
            [
                'size' => '32-LNG'
            ] ,
            [
                'size' => '33-LNG'
            ] ,
            [
                'size' => '34-LNG'
            ] ,
            [
                'size' => '35-LNG'
            ] ,
            [
                'size' => '36-LNG'
            ] ,
            [
                'size' => '37-LNG'
            ] ,
            [
                'size' => '38-LNG'
            ] ,
            [
                'size' => '39-LNG'
            ] ,
            [
                'size' => '40-LNG'
            ] ,
            [
                'size' => 'XXXXXS-SHT'
            ] ,
            [
                'size' => 'XXXXS-SHT'
            ] ,
            [
                'size' => 'XXXS-SHT'
            ] ,
            [
                'size' => 'XXS-SHT'
            ] ,
            [
                'size' => 'XS-SHT'
            ] ,
            [
                'size' => 'S-SHT'
            ] ,
            [
                'size' => 'M-SHT'
            ] ,
            [
                'size' => 'L-SHT'
            ] ,
            [
                'size' => 'XL-SHT'
            ] ,
            [
                'size' => 'XXL-SHT'
            ] ,
            [
                'size' => 'XXXL-SHT'
            ] ,
            [
                'size' => 'XXXXL-SHT'
            ] ,
            [
                'size' => 'XXXXXL-SHT'
            ] ,
            [
                'size' => '2-SHT'
            ] ,
            [
                'size' => '4-SHT'
            ] ,
            [
                'size' => '6-SHT'
            ] ,
            [
                'size' => '8-SHT'
            ] ,
            [
                'size' => '10-SHT'
            ] ,
            [
                'size' => '12-SHT'
            ] ,
            [
                'size' => '14-SHT'
            ] ,
            [
                'size' => '16-SHT'
            ] ,
            [
                'size' => '18-SHT'
            ] ,
            [
                'size' => '20-SHT'
            ] ,
            [
                'size' => '22-SHT'
            ] ,
            [
                'size' => '24-SHT'
            ] ,
            [
                'size' => '26-SHT'
            ] ,
            [
                'size' => '28-SHT'
            ] ,
            [
                'size' => '29-SHT'
            ] ,
            [
                'size' => '30-SHT'
            ] ,
            [
                'size' => '31-SHT'
            ] ,
            [
                'size' => '32-SHT'
            ] ,
            [
                'size' => '33-SHT'
            ] ,
            [
                'size' => '34-SHT'
            ] ,
            [
                'size' => '35-SHT'
            ] ,
            [
                'size' => '36-SHT'
            ]    ,
            [
                'size' => '37-SHT'
            ] ,
            [
                'size' => '38-SHT'
            ] ,
            [
                'size' => '39-SHT'
            ] ,
            [
                'size' => '40-SHT'
            ] ,
            [
                'size' => '00'
            ] ,
            [
                'size' => '0'
            ] ,
            [
                'size' => '1'
            ] ,
            [
                'size' => '2'
            ] ,
            [
                'size' => '3'
            ] ,
            [
                'size' => '4'
            ] ,
            [
                'size' => '5'
            ] ,
            [
                'size' => '6'
            ] ,
            [
                'size' => '7'
            ] ,
            [
                'size' => '8'
            ] ,
            [
                'size' => '9'
            ] ,
            [
                'size' => '10'
            ] ,
            [
                'size' => '11'
            ] ,
            [
                'size' => '12'
            ] ,
            [
                'size' => '14'
            ] ,
            [
                'size' => '16'
            ] ,
            [
                'size' => '18'
            ] ,
            [
                'size' => '20'
            ] ,
            [
                'size' => '00-REG'
            ] ,
            [
                'size' => '0-REG'
            ] ,
            [
                'size' => '2-REG'
            ] ,
            [
                'size' => '4-REG'
            ] ,
            [
                'size' => '6-REG'
            ] ,
            [
                'size' => '8-REG'
            ] ,
            [
                'size' => '10-REG'
            ] ,
            [
                'size' => '12-REG'
            ] ,
            [
                'size' => '14-REG'
            ] ,
            [
                'size' => '16-REG'
            ] ,
            [
                'size' => '18-REG'
            ] ,
            [
                'size' => '20-REG'
            ] ,
            [
                'size' => '22-REG'
            ] ,
            [
                'size' => '24-REG'
            ] ,
            [
                'size' => '26-REG'
            ] ,
            [
                'size' => '28-REG'
            ] ,
            [
                'size' => '30-REG'
            ] ,
            [
                'size' => '31-REG'
            ] ,
            [
                'size' => '32-REG'
            ] ,
            [
                'size' => '33-REG'
            ] ,
            [
                'size' => '34-REG'
            ] ,
            [
                'size' => '35-REG'
            ] ,
            [
                'size' => '36-REG'
            ] ,
            [
                'size' => '37-REG'
            ] ,
            [
                'size' => '38-REG'
            ] ,
            [
                'size' => '39-REG'
            ] ,
            [
                'size' => '40-REG'
            ] ,
            [
                'size' => '00-LNG'
            ] ,
            [
                'size' => '0-LNG'
            ] ,
            [
                'size' => '2-LNG'
            ] ,
            [
                'size' => '4-LNG'
            ] ,
            [
                'size' => '6-LNG'
            ] ,
            [
                'size' => '8-LNG'
            ] ,
            [
                'size' => '10-LNG'
            ] ,
            [
                'size' => '12-LNG'
            ] ,
            [
                'size' => '14-LNG'
            ] ,
            [
                'size' => '16-LNG'
            ] ,
            [
                'size' => '18-LNG'
            ] ,
            [
                'size' => '20-LNG'
            ] ,
            [
                'size' => '0-3M'
            ] ,
            [
                'size' => '3-6M'
            ] ,
            [
                'size' => '6-12M'
            ] ,
            [
                'size' => '12-18M'
            ] ,
            [
                'size' => '18-24M'
            ] ,
            [
                'size' => '2XL'
            ] ,
            [
                'size' => '3XL'
            ] ,
            [
                'size' => '4XL'
            ] ,
            [
                'size' => '5XL'
            ] ,
            [
                'size' => '59/40 (0-3M)'
            ] ,
            [
                'size' => '66/44 (3-6M)'
            ] ,
            [
                'size' => '73/48 (6-12M)'
            ] ,
            [
                'size' => '80/48 (12-18M)'
            ] ,
            [
                'size' => '90/52 (18-24M)'
            ] ,
            [
                'size' => '59/41 (0-3M)'
            ] ,
            [
                'size' => '73/47 (6-12M)'
            ] ,
            [
                'size' => '80/47 (12-18M)'
            ] ,
            [
                'size' => '90/50 (18-24M)'
            ] ,
            [
                'size' => '90/52 (2)'
            ] ,
            [
                'size' => '100/56 (3)'
            ] ,
            [
                'size' => '110/56 (4)'
            ] ,
            [
                'size' => '110/60 (5)'
            ] ,
            [
                'size' => '120/60 (6)'
            ] ,
            [
                'size' => '130/64 (7)'
            ] ,
            [
                'size' => '90/50 (2)'
            ] ,
            [
                'size' => '100/53 (3)'
            ] ,
            [
                'size' => '110/53 (4)'
            ] ,
            [
                'size' => '110/56 (5)'
            ] ,
            [
                'size' => '120/56 (6)'
            ] ,
            [
                'size' => '130/59 (7)'
            ] ,
            [
                'size' => '120/60 (XS)'
            ] ,
            [
                'size' => '130/64 (S)'
            ] ,
            [
                'size' => '140/68 (M)'
            ] ,
            [
                'size' => '150/72 (L)'
            ] ,
            [
                'size' => '160/76 (XL)'
            ] ,
            [
                'size' => '170/84 (XXL)'
            ] ,
            [
                'size' => '120/53 (XS)'
            ] ,
            [
                'size' => '130/56 (S)'
            ] ,
            [
                'size' => '140/58 (M)'
            ] ,
            [
                'size' => '150/61 (L)'
            ] ,
            [
                'size' => '160/64 (XL)'
            ] ,
            [
                'size' => '170/67 (XXL)'
            ] ,
            [
                'size' => '120/56 (XS)'
            ] ,
            [
                'size' => '130/59 (S)'
            ] ,
            [
                'size' => '140/60 (M)'
            ] ,
            [
                'size' => '150/63 (L)'
            ] ,
            [
                'size' => '160/66 (XL)'
            ] ,
            [
                'size' => '170/69 (XXL)'
            ] ,
            [
                'size' => '120/56 (XS-REG)'
            ] ,
            [
                'size' => '130/59 (S-REG)'
            ] ,
            [
                'size' => '140/60 (M-REG)'
            ] ,
            [
                'size' => '140/60 (M-REG)'
            ] ,
            [
                'size' => '150/63 (L-REG)'
            ] ,
            [
                'size' => '160/66 (XL-REG)'
            ] ,
            [
                'size' => '170/69 (XXL-REG)'
            ] ,
            [
                'size' => '160/76A(XXS)'
            ] ,
            [
                'size' => '165/84A(XS)'
            ] ,
            [
                'size' => '170/92A(S)'
            ] ,
            [
                'size' => '175/100A(M)'
            ] ,
            [
                'size' => '180/108A(L)'
            ] ,
            [
                'size' => '185/116A(XL)'
            ] ,
            [
                'size' => '190/124A(XXL)'
            ] ,
            [
                'size' => '190/132A(XXXL)'
            ] ,
            [
                'size' => '175/100A(S/M)'
            ] ,
            [
                'size' => '180/108A(M/L)'
            ] ,
            [
                'size' => '185/116A(L/XL)'
            ] ,
            [
                'size' => '160/76A(XXS-REG)'
            ] ,
            [
                'size' => '165/84A(XS-REG)'
            ] ,
            [
                'size' => '170/92A(S-REG)'
            ] ,
            [
                'size' => '175/100A(M-REG)'
            ] ,
            [
                'size' => '180/108A(L-REG)'
            ] ,
            [
                'size' => '185/116A(XL-REG)'
            ] ,
            [
                'size' => '190/124A(XXL-REG)'
            ] ,
            [
                'size' => '190/132A(XXXL-REG)'
            ] ,
            [
                'size' => '160/76A(XXS-LNG)'
            ] ,
            [
                'size' => '165/84A(XS-LNG)'
            ] ,
            [
                'size' => '170/92A(S-LNG)'
            ] ,
            [
                'size' => '175/100A(M-LNG)'
            ] ,
            [
                'size' => '180/108A(L-LNG)'
            ] ,
            [
                'size' => '185/116A(XL-LNG)'
            ] ,
            [
                'size' => '190/124A(XXL-LNG)'
            ] ,
            [
                'size' => '190/132A(XXXL-LNG)'
            ] ,
            [
                'size' => '155/80A(XS)'
            ] ,
            [
                'size' => '160/84A(S)'
            ] ,
            [
                'size' => '165/92A(M)'
            ] ,
            [
                'size' => '170/96A(L)'
            ] ,
            [
                'size' => '175/104A(XL)'
            ] ,
            [
                'size' => '180/108A(XXL)'
            ] ,
            [
                'size' => '180/112A(XXXL)'
            ] ,
            [
                'size' => '160/84A(XS/S)'
            ] ,
            [
                'size' => '165/92A(S/M)'
            ] ,
            [
                'size' => '170/96A(M/L)'
            ] ,
            [
                'size' => '175/104A(L/XL)'
            ] ,
            [
                'size' => '195/132A(XXXL)'
            ] ,
            [
                'size' => '160/60A(XXS)'
            ] ,
            [
                'size' => '165/68A(XS)'
            ] ,
            [
                'size' => '170/76A(S)'
            ] ,
            [
                'size' => '175/84A(M)'
            ] ,
            [
                'size' => '180/92A(L)'
            ] ,
            [
                'size' => '185/98A(XL)'
            ] ,
            [
                'size' => '190/106A(XXL)'
            ] ,
            [
                'size' => '175/84A(S/M)'
            ] ,
            [
                'size' => '180/92A(M/L)'
            ] ,
            [
                'size' => '185/98A(L/XL)'
            ] ,
            [
                'size' => '165/72A(28)'
            ] ,
            [
                'size' => '170/76A(30)'
            ] ,
            [
                'size' => '175/78A(31)'
            ] ,
            [
                'size' => '175/82A(32)'
            ] ,
            [
                'size' => '180/84A(33)'
            ] ,
            [
                'size' => '180/86A(34)'
            ] ,
            [
                'size' => '185/92A(36)'
            ] ,
            [
                'size' => '185/96A(38)'
            ] ,
            [
                'size' => '190/102A(40)'
            ] ,
            [
                'size' => '160/60A(XXS-REG)'
            ] ,
            [
                'size' => '165/68A(XS-REG)'
            ] ,
            [
                'size' => '170/76A(S-REG)'
            ] ,
            [
                'size' => '175/84A(M-REG)'
            ] ,
            [
                'size' => '180/92A(L-REG)'
            ] ,
            [
                'size' => '185/98A(XL-REG)'
            ] ,
            [
                'size' => '190/106A(XXL-REG)'
            ] ,
            [
                'size' => '190/106A(XXL-REG)'
            ] ,
            [
                'size' => '175/84A(S/M-REG)'
            ] ,
            [
                'size' => '175/84A(S/M-REG)'
            ] ,
            [
                'size' => '185/98A(L/XL-REG)'
            ] ,
            [
                'size' => '165/72A(28-REG)'
            ] ,
            [
                'size' => '170/74A(29-REG)'
            ] ,
            [
                'size' => '170/76A(30-REG)'
            ] ,
            [
                'size' => '175/78A(31-REG)'
            ] ,
            [
                'size' => '175/82A(32-REG)'
            ] ,
            [
                'size' => '180/84A(33-REG)'
            ] ,
            [
                'size' => '180/86A(34-REG)'
            ] ,
            [
                'size' => '185/92A(36-REG)'
            ] ,
            [
                'size' => '185/96A(38-REG)'
            ] ,
            [
                'size' => '190/102A(40-REG)'
            ] ,
            [
                'size' => '165/68A(XS-LNG)'
            ] ,
            [
                'size' => '170/76A(S-LNG)'
            ] ,
            [
                'size' => '175/84A(M-LNG)'
            ] ,
            [
                'size' => '180/92A(L-LNG)'
            ] ,
            [
                'size' => '185/98A(XL-LNG)'
            ] ,
            [
                'size' => '190/106A(XXL-LNG)'
            ] ,
            [
                'size' => '165/72A(28-LNG)'
            ] ,
            [
                'size' => '170/76A(30-LNG)'
            ] ,
            [
                'size' => '175/78A(31-LNG)'
            ] ,
            [
                'size' => '175/82A(32-LNG)'
            ] ,
            [
                'size' => '180/84A(33-LNG)'
            ] ,
            [
                'size' => '180/86A(34-LNG)'
            ] ,
            [
                'size' => '185/92A(36-LNG)'
            ] ,
            [
                'size' => '185/96A(38-LNG)'
            ] ,
            [
                'size' => '190/102A(40-LNG)'
            ] ,
            [
                'size' => '160/60A(XXS-SHT)'
            ] ,
            [
                'size' => '165/68A(XS-SHT)'
            ] ,
            [
                'size' => '170/76A(S-SHT)'
            ] ,
            [
                'size' => '175/84A(M-SHT)'
            ] ,
            [
                'size' => '180/92A(L-SHT)'
            ] ,
            [
                'size' => '185/98A(XL-SHT)'
            ] ,
            [
                'size' => '190/106A(XXL-SHT)'
            ] ,
            [
                'size' => '165/72A(28-SHT)'
            ] ,
            [
                'size' => '170/76A(30-SHT)'
            ] ,
            [
                'size' => '175/78A(31-SHT)'
            ] ,
            [
                'size' => '175/82A(32-SHT)'
            ] ,
            [
                'size' => '180/84A(33-SHT)'
            ] ,
            [
                'size' => '180/84A(33-SHT)'
            ] ,
            [
                'size' => '185/92A(36-SHT)'
            ] ,
            [
                'size' => '185/96A(38-SHT)'
            ] ,
            [
                'size' => '190/102A(40-SHT)'
            ] ,
            [
                'size' => '190/102A(40-SHT)'
            ] ,
            [
                'size' => '155/62A(XS)'
            ] ,
            [
                'size' => '160/68A(S)'
            ] ,
            [
                'size' => '165/74A(M)'
            ] ,
            [
                'size' => '170/80A(L)'
            ] ,
            [
                'size' => '175/86A(XL)'
            ] ,
            [
                'size' => '180/90A(XXL)'
            ] ,
            [
                'size' => '160/68A(XS/S)'
            ] ,
            [
                'size' => '165/74A(S/M)'
            ] ,
            [
                'size' => '170/80A(M/L)'
            ] ,
            [
                'size' => '175/86A(L/XL)'
            ] ,
            [
                'size' => '185/94A(XXXL)'
            ] ,
            [
                'size' => '155/62A(00)'
            ] ,
            [
                'size' => '155/64A(0)'
            ] ,
            [
                'size' => '160/66A(2)'
            ] ,
            [
                'size' => '160/68A(4)'
            ] ,
            [
                'size' => '165/72A(6)'
            ] ,
            [
                'size' => '165/74A(8)'
            ] ,
            [
                'size' => '170/76A(10)'
            ] ,
            [
                'size' => '175/78A(12)'
            ] ,
            [
                'size' => '175/80A(14)'
            ] ,
            [
                'size' => '180/82A(16)'
            ] ,
            [
                'size' => '150/56A(XXS-REG)'
            ] ,
            [
                'size' => '155/62A(XS-REG)'
            ] ,
            [
                'size' => '160/68A(S-REG)'
            ] ,
            [
                'size' => '165/74A(M-REG)'
            ] ,
            [
                'size' => '170/80A(L-REG)'
            ] ,
            [
                'size' => '175/86A(XL-REG)'
            ] ,
            [
                'size' => '180/90A(XXL-REG)'
            ] ,
            [
                'size' => '185/94A(XXXL-REG)'
            ] ,
            [
                'size' => '160/68A(XS/S-REG)'
            ] ,
            [
                'size' => '165/74A(S/M-REG)'
            ] ,
            [
                'size' => '170/80A(M/L-REG)'
            ] ,
            [
                'size' => '155/62A(00-REG)'
            ] ,
            [
                'size' => '155/64A(0-REG)'
            ] ,
            [
                'size' => '160/66A(2-REG)'
            ] ,
            [
                'size' => '160/68A(4-REG)'
            ] ,
            [
                'size' => '165/72A(6-REG)'
            ] ,
            [
                'size' => '165/74A(8-REG)'
            ] ,
            [
                'size' => '170/76A(10-REG)'
            ] ,
            [
                'size' => '175/78A(12-REG)'
            ] ,
            [
                'size' => '175/80A(14-REG)'
            ] ,
            [
                'size' => '180/82A(16-REG)'
            ] ,
            [
                'size' => '155/62A(XS-LNG)'
            ] ,
            [
                'size' => '160/68A(S-LNG)'
            ] ,
            [
                'size' => '165/74A(M-LNG)'
            ] ,
            [
                'size' => '170/80A(L-LNG)'
            ] ,
            [
                'size' => '175/86A(XL-LNG)'
            ] ,
            [
                'size' => '155/62A(00-LNG)'
            ] ,
            [
                'size' => '155/64A(0-LNG)'
            ] ,
            [
                'size' => '160/66A(2-LNG)'
            ] ,
            [
                'size' => '160/68A(4-LNG)'
            ] ,
            [
                'size' => '165/72A(6-LNG)'
            ] ,
            [
                'size' => '165/74A(8-LNG)'
            ] ,
            [
                'size' => '170/76A(10-LNG)'
            ] ,
            [
                'size' => '175/78A(12-LNG)'
            ] ,
            [
                'size' => '175/80A(14-LNG)'
            ] ,
            [
                'size' => '180/82A(16-LNG)'
            ] ,
            [
                'size' => '155/62A(XS-SHT)'
            ] ,
            [
                'size' => '160/68A(S-SHT)'
            ] ,
            [
                'size' => '160/68A(S-SHT)'
            ] ,
            [
                'size' => '160/68A(S-SHT)'
            ] ,
            [
                'size' => '175/86A(XL-SHT)'
            ] ,
            [
                'size' => '155/62A(00-SHT)'
            ] ,
            [
                'size' => '155/64A(0-SHT)'
            ] ,
            [
                'size' => '160/66A(2-SHT)'
            ] ,
            [
                'size' => '160/68A(4-SHT)'
            ] ,
            [
                'size' => '165/72A(6-SHT)'
            ] ,
            [
                'size' => '165/74A(8-SHT)'
            ] ,
            [
                'size' => '170/76A(10-SHT)'
            ] ,
            [
                'size' => '175/78A(12-SHT)'
            ] ,
            [
                'size' => '175/80A(14-SHT)'
            ] ,
            [
                'size' => '175/80A(14-SHT)'
            ] ,
            [
                'size' => '160/72A(XXS)'
            ] ,
            [
                'size' => '160/76A(XS)'
            ] ,
            [
                'size' => '165/84A(S)'
            ] ,
            [
                'size' => '170/92A(M)'
            ] ,
            [
                'size' => '170/92A(M)'
            ] ,
            [
                'size' => '180/108A(XL)'
            ] ,
            [
                'size' => '185/116A(XXL)'
            ] ,
            [
                'size' => '190/124A(XXXL)'
            ] ,
            [
                'size' => '190/132A(XXXXL)'
            ] ,
            [
                'size' => '150/72A(XXS)'
            ] ,
            [
                'size' => '150/76A(XS)'
            ] ,
            [
                'size' => '155/80A(S)'
            ] ,
            [
                'size' => '160/84A(M)'
            ] ,
            [
                'size' => '165/92A(L)'
            ] ,
            [
                'size' => '170/96A(XL)'
            ] ,
            [
                'size' => '175/104A(XXL)'
            ] ,
            [
                'size' => '180/108A(XXXL)'
            ] ,
            [
                'size' => '160/60A(XS)'
            ] ,
            [
                'size' => '165/68A(S)'
            ] ,
            [
                'size' => '170/76A(M)'
            ] ,
            [
                'size' => '175/84A(L)'
            ] ,
            [
                'size' => '180/92A(XL)'
            ] ,
            [
                'size' => '185/98A(XXL)'
            ] ,
            [
                'size' => '190/106A(XXXL)'
            ] ,
            [
                'size' => '165/68A(S-REG)'
            ] ,
            [
                'size' => '170/76A(M-REG)'
            ] ,
            [
                'size' => '175/84A(L-REG)'
            ] ,
            [
                'size' => '180/92A(XL-REG)'
            ] ,
            [
                'size' => '185/98A(XXL-REG)'
            ] ,
            [
                'size' => '190/106A(XXXL-REG)'
            ] ,
            [
                'size' => '160/68A(26-REG)'
            ] ,
            [
                'size' => '165/68A(S-LNG)'
            ] ,
            [
                'size' => '170/76A(M-LNG)'
            ] ,
            [
                'size' => '175/84A(L-LNG)'
            ] ,
            [
                'size' => '180/92A(XL-LNG)'
            ] ,
            [
                'size' => '185/98A(XXL-LNG)'
            ] ,
            [
                'size' => '190/106A(XXXL-LNG)'
            ] ,
            [
                'size' => '165/68A(S-SHT)'
            ] ,
            [
                'size' => '170/76A(M-SHT)'
            ] ,
            [
                'size' => '175/84A(L-SHT)'
            ] ,
            [
                'size' => '175/84A(L-SHT)'
            ] ,
            [
                'size' => '185/98A(XXL-SHT)'
            ] ,
            [
                'size' => '190/106A(XXXL-SHT)'
            ] ,
            [
                'size' => '150/56A(XS)'
            ] ,
            [
                'size' => '155/62A(S)'
            ] ,
            [
                'size' => '160/68A(M)'
            ] ,
            [
                'size' => '165/74A(L)'
            ] ,
            [
                'size' => '170/80A(XL)'
            ] ,
            [
                'size' => '175/86A(XXL)'
            ] ,
            [
                'size' => '155/62A(2)'
            ] ,
            [
                'size' => '155/64A(4)'
            ] ,
            [
                'size' => '160/66A(6)'
            ] ,
            [
                'size' => '160/68A(8)'
            ] ,
            [
                'size' => '165/72A(10)'
            ] ,
            [
                'size' => '165/74A(12)'
            ] ,
            [
                'size' => '170/76A(14)'
            ] ,
            [
                'size' => '175/78A(16)'
            ] ,
            [
                'size' => '175/80A(18)'
            ] ,
            [
                'size' => '180/82A(20)'
            ] ,
            [
                'size' => '150/56A(XS-REG)'
            ] ,
            [
                'size' => '155/62A(S-REG)'
            ] ,
            [
                'size' => '160/68A(M-REG)'
            ] ,
            [
                'size' => '165/74A(L-REG)'
            ] ,
            [
                'size' => '170/80A(XL-REG)'
            ] ,
            [
                'size' => '175/86A(XXL-REG)'
            ] ,
            [
                'size' => '180/90A(XXXL-REG)'
            ] ,
            [
                'size' => '155/62A(2-REG)'
            ] ,
            [
                'size' => '155/64A(4-REG)'
            ] ,
            [
                'size' => '160/66A(6-REG)'
            ] ,
            [
                'size' => '160/68A(8-REG)'
            ] ,
            [
                'size' => '165/72A(10-REG)'
            ] ,
            [
                'size' => '165/74A(12-REG)'
            ] ,
            [
                'size' => '170/76A(14-REG)'
            ] ,
            [
                'size' => '175/78A(16-REG)'
            ] ,
            [
                'size' => '175/80A(18-REG)'
            ] ,
            [
                'size' => '180/82A(20-REG)'
            ] ,
            [
                'size' => '155/62A(S-LNG)'
            ] ,
            [
                'size' => '160/68A(M-LNG)'
            ] ,
            [
                'size' => '165/74A(L-LNG)'
            ] ,
            [
                'size' => '170/80A(XL-LNG)'
            ] ,
            [
                'size' => '170/80A(XL-LNG)'
            ] ,
            [
                'size' => '155/62A(2-LNG)'
            ] ,
            [
                'size' => '155/64A(4-LNG)'
            ] ,
            [
                'size' => '160/66A(6-LNG)'
            ] ,
            [
                'size' => '160/68A(8-LNG)'
            ] ,
            [
                'size' => '165/72A(10-LNG)'
            ] ,
            [
                'size' => '165/74A(12-LNG)'
            ] ,
            [
                'size' => '170/76A(14-LNG)'
            ] ,
            [
                'size' => '175/78A(16-LNG)'
            ] ,
            [
                'size' => '175/80A(18-LNG)'
            ] ,
            [
                'size' => '180/82A(20-LNG)'
            ] ,
            [
                'size' => '155/62A(S-SHT)'
            ] ,
            [
                'size' => '160/68A(M-SHT)'
            ] ,
            [
                'size' => '165/74A(L-SHT)'
            ] ,
            [
                'size' => '170/80A(XL-SHT)'
            ] ,
            [
                'size' => '175/86A(XXL-SHT)'
            ] ,
            [
                'size' =>  '155/62A(2-SHT)'
            ] ,
            [
                'size' => '155/64A(4-SHT)'
            ] ,
            [
                'size' => '160/66A(6-SHT)'
            ] ,
            [
                'size' => '160/68A(8-SHT)'
            ] ,
            [
                'size' => '165/72A(10-SHT)'
            ] ,
            [
                'size' => '165/74A(12-SHT)'
            ] ,
            [
                'size' => '170/76A(14-SHT)'
            ] ,
            [
                'size' => '175/78A(16-SHT)'
            ] ,
            [
                'size' => '175/80A(18-SHT)'
            ] ,
            [
                'size' => '180/82A(20-SHT)'
            ] ,
            [
                'size' => '1X'
            ] ,
            [
                'size' => '2X'
            ] ,
            [
                'size' => '3X'
            ] ,
            [
                'size' => '4X'
            ] ,
            [
                'size' => '5X'
            ] ,
            [
                'size' => '1M'
            ] ,
            [
                'size' => '2M'
            ] ,
            [
                'size' => '3M'
            ] ,
            [
                'size' => '6M'
            ] ,
            [
                'size' => '9M'
            ] ,
            [
                'size' => '12M'
            ] ,
            [
                'size' => '18M'
            ] ,
            [
                'size' => '24M'
            ] ,
            [
                'size' => '10W-REG'
            ] ,
            [
                'size' => '12W-REG'
            ] ,
            [
                'size' => '14W-REG'
            ] ,
            [
                'size' => '16W-REG'
            ] ,
            [
                'size' => '18W-REG'
            ] ,
            [
                'size' => '20W-REG'
            ] ,
            [
                'size' => '22W-REG'
            ] ,
            [
                'size' => '24W-REG'
            ] ,
            [
                'size' => '26W-REG'
            ] ,
            [
                'size' => '28W-REG'
            ] ,
            [
                'size' => '30W-REG'
            ] ,

        ];

        foreach($sizes as $size){
            Size::create($size);
        }
    }
}
