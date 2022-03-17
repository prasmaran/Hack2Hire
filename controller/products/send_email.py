import smtplib
from datetime import date
from email.mime.multipart import MIMEMultipart
from email.mime.text import MIMEText
from email.mime.application import MIMEApplication

def send_test_mail(body):
    sender_email = "mariobrowser2@gmail.com"
    receiver_email = "pprasanthmaran@gmail.com"

    msg = MIMEMultipart()
    msg['Subject'] = '[Email Test]'
    msg['From'] = sender_email
    msg['To'] = receiver_email

    msgText = MIMEText('<b>%s</b>' % (body), 'html')
    msg.attach(msgText)

    # filename = "example.txt"
    # msg.attach(MIMEText(open(filename).read()))

    # with open('forest.jpg', 'rb') as fp:
    #     img = MIMEImage(fp.read())
    #     img.add_header('Content-Disposition', 'attachment', filename="forest.jpg")
    #     msg.attach(img) 
    
    pdf = MIMEApplication(open("restock.pdf", 'rb').read())
    pdf.add_header('Content-Disposition', 'attachment', filename= "restock.pdf")
    msg.attach(pdf)

    try:
        with smtplib.SMTP('smtp.gmail.com', 587) as smtpObj:
            smtpObj.ehlo()
            smtpObj.starttls()
            smtpObj.login(sender_email, "PRASANTH!((*")
            smtpObj.sendmail(sender_email, receiver_email, msg.as_bytes())
    except Exception as e:
        print(e)


if __name__ == "__main__":

    today = date.today()
    d2 = today.strftime("%B %d, %Y")
    send_test_mail("Restock Needed " + d2)