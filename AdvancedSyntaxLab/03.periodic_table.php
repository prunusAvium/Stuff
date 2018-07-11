<?php
$data = [];
$symbols = symbol();
$readLine = fgets(STDIN);
$split = explode(',', $readLine);
for ($i = 0; $i < count($split); $i++) {
    $element = trim($split[$i]);
    if (!in_array($element, $symbols)){
        continue;
    }
    if (!array_key_exists($element, $data)) {
        $data[$element] = 0;
    }
    $data[$element] += 1;
}
uniqueElement($data);
printResult($data);
function uniqueElement(array &$data)
{
    foreach ($data as $k => $v) {
        if ($data[$k] > 1) {
            unset($data[$k]);
        }
    }
}
function printResult(array $data)
{
    $index = 0;
    foreach ($data as $k => $v) {
        $message = $k;
        if ($index < count($data) - 1) {
            $message .= ' ';
        }
        $index++;
        echo $message;
    }
}
function symbol()
{
    $symbol = 'Ac
Ag
Al
Am
Ar
As
At
Au
B
Ba
Be
Bh
Bi
Bk
Br
C
Ca
Cd
Ce
Cf
Cl
Cm
Cn
Co
Cr
Cs
Cu
Db
Ds
Dy
Er
Es
Eu
F
Fe
Fl
Fm
Fr
Ga
Gd
Ge
H
He
Hf
Hg
Ho
Hs
I
In
Ir
K
Kr
La
Li
Lr
Lu
Lv
Mc
Md
Mg
Mn
Mo
Mt
N
Na
Nb
Nd
Ne
Nh
Ni
No
Np
O
Og
Os
P
Pa
Pb
Pd
Pm
Po
Pr
Pt
Pu
Ra
Rb
Re
Rf
Rg
Rh
Rn
Ru
S
Sb
Sc
Se
Sg
Si
Sm
Sn
Sr
Ta
Tb
Tc
Te
Th
Ti
Tl
Tm
Ts
U
V
W
Xe
Y
Yb
Zn
Zr';
    $replace = preg_replace("/[\\r\\n]+/", ',', $symbol);
    return explode(',', $replace);
}