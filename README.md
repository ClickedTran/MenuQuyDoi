## General
<h3 align="center"><u>INFO PLUGIN</u></h3>
<table border="1" align="center">
<tr>
<th><p><u>PLUGIN</u></p></th>
<th><p><u>API</u></p></th>
<th><p><u>VERSION</u></p></th>
</tr>
<tr>
<td align="center">
<p>MenuQuyDoi</p>
</td>
<td align="center">
<p>4.0.0</p>
</td>
<td align="center">
<p>2.0.0</p>
</td>
</tr>
</table>
<br>
<h3 align="center"><u>ALL COMMAND FOR PLUGIN</u></h3>
<table border="1" align="center">
<tr>
<th><p>Command</p></th>
<th><p>Subcommand</p></th>
<th><p>Aliases</p></th>
<th><p>Default Permission</p></th>
</tr>
<tr>
<th rowspan="6">/menuquydoi</th>
</tr>
<tr>
<td align="center">
<p>help</p>
</td>
<td align="center">
<p>Help you know the whole command</p>
</td>
<td align="center">
<p><u><o>true<u><o></p>
</td>
</tr>
<tr>
<td align="center">
<p>list</p>
</td>
<td align="center">
<p>Help you know the conversion price</p>
</td>
<td align="center">
<p><u><o>true<u><o></p>
</td>
</tr>
<tr>
<td align="center">
<p>changecoin</p>
</td>
<td align="center">
<p>Open Menu Exchange Coin From Point</p>
</td>
<td align="center">
<p><u><o>true<u><o></p>
</td>
</tr>
<tr>
<td align="center">
<p>changemoney</p>
</td>
<td align="center">
<p>Open Menu Exchange Money From Coin and Point</p>
</td>
<td align="center">
<p><u><o>true<u><o></p>
</td>
</tr>
<tr>
<td align="center">
<p>changepoint</p>
</td>
<td align="center">
<p>Open Menu Exchange Point From Money</p>
</td>
<td align="center">
<p><u><o>true<u><o></p>
</td>
</tr>
</table>
<br>

## Feature
- This is Plugin allows you to exchange certain currencies in the server
- If you wonder why this is 2.0 and not 1.0, I will answer because version 1.0 of this plugin is in PocketMine 3.x.x and it was copied by <strong>SWhiteMC</strong> player

## Config
<details>
<summary>Click Here To See The Config</summary>

```Yaml
---
#MenuQuyDoi Config
#Menu
#Title-Menu: "§l§6« §cMenuQuyDoi§6 »"
#Content-Menu: "§aXin Chào:§b {player}{line}§cCoin§a của bạn:§9 {coin}{line}§cPoint§a của bạn:§9 {point}{line}§cMoney§a của bạn:§9 {money}"
#Button-Change-Coin: "§l§3Change §bCoin"
#Button-Change-Coin: "§l§3Change §bPoint"
#Button-Change-Coin: "§l§3Change §bMoney"

Button-Exit: "§cEXIT"

#List Price
Title-List-Price: "§l§a« §bBảng Giá Quy Đổi §a»"
List-Price-Exchange: "Dưới đây là giá quy đổi: {line}§91 §cCoin §b=> §92000 §cMoney{line}§91 §cPoint §b=> §91000 §cMoney{line}§94000 §cMoney §b=> §91 §cCoin{line}§92000 §cMoney §b=> §91 §cPoint"

#Menu Change Coin
Title-Menu-Coin: "§l§6« §bChange§c Coin§6 »"
Amount-Change-Coin: "Nhập số coin muốn đổi vào đây!"
Price-Change-Coin: 100
Not-enough-point: "§b[§cFAIL§b]§c Bạn Không Đủ Point Để Đổi Sang Coin!"
Succes-Change-Coin: "§b[§aSUCCES§b]§e Bạn đã đổi thành công §d{amount}§7Coin §evới giá §c{price} §7Point{line}§aCảm ơn bạn đã sử dụng§b MenuQuyDoi!!"

#Menu Change Point
Title-Menu-Point: "§l§6« §bChange§c Point§6 »"
Amount-Change-Point: "Nhập số point muốn đổi vào đây!"
Price-Change-Point: 1000
Not-enough-money: "§b[§cFAIL§b]§c Bạn Không Đủ Money Để Đổi Sang Point!"
Succes-Change-Point: "§b[§aSUCCES§b]§e Bạn đã đổi thành công §d{amount} §7Point §evới giá §c{price}§7 Money{line}§aCảm ơn bạn đã sử dụng§b MenuQuyDoi!!"

#Menu Change Money
Title-Menu-Money: "§l§6« §bMenu Change§c Money§6 »"
Content-Menu-Money: "§aXin Chào:§b {player}{line}§cCoin§a của bạn:§9 {coin}{line}§cPoint§a của bạn:§9 {point}{line}§cMoney§a của bạn:§9 {money}"
Button-Exchange-From-Point: "§l§aĐổi Money Từ Point"
Button-Exchange-From-Coin: "§l§aĐổi Money Từ Coin"

#Menu Exchange Money From Point
Title-Exchange-From-Point: "§l§6« §bExchange From §cPoint"
Price-Exchange-Money-From-Point: 1
Amount-Money-From-Point: 1000  #This is the amount players get after converting points to money
Amount-Exchange-Money-From-Point: "Nhập số Point mà bạn muốn đổi thành Money vào đây!"
Not-enough-point: "§b[§cFAIL§b]§c Bạn Không Đủ Point Để Đổi Sang Money!"
Succes-Change-Money-From-Point: "§b[§aSUCCES§b]§e Bạn đã đổi thành công §d{amount} §7Money §evới giá §c{price}§7 Point{line}§aCảm ơn bạn đã sử dụng§b MenuQuyDoi!!"

#Menu Exchange Money From Coin
Title-Exchange-Money-From-Coin: "§l§6« §bExchange From §cCoin"
Price-Exchange-Money-From-Coin: 1
Amount-Money-From-Coin: 2000  #This is the amount players get after converting points to money
Amount-Exchange-Money-From-Coin: "Nhập số Coin mà bạn muốn đổi thành Money vào đây!"
Not-enough-coin: "§b[§cFAIL§b]§c Bạn Không Đủ Coin Để Đổi Sang Money!"
Succes-Exchange-Money-From-Coin: "§b[§aSUCCES§b]§e Bạn đã đổi thành công §d{amount} §7Money §evới giá §c{price}§7 Coin{line}§aCảm ơn bạn đã sử dụng§b MenuQuyDoi!!"

#Permission all Command
No-Permission: "§cBạn không có quyền sử dụng lệnh này!"

#Note
#{player} = Player Name
#{coin} = Player Coin
#{point} = Player Point
#{money} = Player Money
#{line} = \n

#There should always be 4 plugins: FormAPI, CoinAPI, PointAPI, EconomyAPI in the Plugins folder And Used in PocketMine version 4.0.0 or higher
#FormAPI: https://github.com/jojoe77777/FormAPI
#CoinAPI: https://github.com/BeeAZ-pm-pl/CoinAPI-4.0.0
#PointAPI: https://github.com/Clickedtran/PointAPI_4.0.0
#EconomyAPI: https://github.com/onebone/EconomyS
...
```

</details>
<br>

## Support
- [FormAPI](https://github.com/jojoe77777/FormAPI)(jojoe77777)
- [PointAPI](https://github.com/Clickedtran/PointAPI_4.0.0)(onebone)
- [CoinAPI](https://github.com/BeeAZ-pm-pl/CoinAPI-4.0.0)(onebone)
- [EconomyAPI](https://github.com/onebone/EconomyS)(onebone)
<br>

## Download
- If you use a computer, you probably already know how to download
- If you are using Android, please click <a href="https://github.com/Clickedtran/MenuQuyDoi/archive/refs/heads/Master.zip">to here</a>
<br>

## Install
>- Step 1: Click the `Direct Download` button to download the plugin
>- Step 2: move the file `MenuquyDoi.phar` into the file `plugins`
>- Step 3: Restart server
