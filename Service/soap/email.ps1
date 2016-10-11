$emailTo = $args[0]

#echo $emailTo
#echo $sub
#echo $bdy


$EmailFrom = "krishsrikanth2@gmail.com"
#$EmailTo = "srikanth90.krish@gmail.com"
$EmailTo = $emailTo
$Subject = "Purchase order Received"
$Body = "Thanks for shopping with us, hope you enjoy your books"


$SMTPServer = "smtp.gmail.com"
$SMTPClient = New-Object Net.Mail.SmtpClient($SmtpServer, 587)
$SMTPClient.EnableSsl = $true
$SMTPClient.Credentials = New-Object System.Net.NetworkCredential("krishsrikanth2@gmail.com", "localhost123");
$SMTPClient.Send($EmailFrom, $EmailTo, $Subject, $Body)