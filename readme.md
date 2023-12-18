# BPR Kancana

## How to install (on server)
*****************
```zsh
 git clone git@github.com:MKM-Honda/BPRKancana.git
 ```

```zsh
git pull origin main
```

Update the environment
```zsh
cp .env.example .env
```

_Note : BPR_TOKEN must be created with Bcrypt, the unhashed word will be required by some controller_


If you need to copy all uploaded files to local:
```zsh
rsync -aPz -e ssh mkmhonda@103.28.22.19:/var/www/html/BPRKancana/uploads /home/user/Downloads
```

Then copy all file manually to each folder inside the uploads folder on local BPRKancana

## Tech Stack
- PHP 5.6
- Postgresql
- MySQL
- DomPDF
- MobileDetect
- PDFParser
- PHPDotenv
- PHPExcel
- Bootstrap 4.6
- JQuery
- Select2
- DateRangePicker
- Google Calendar (National Holiday)
- Full Calendar
- Add to Calendar
