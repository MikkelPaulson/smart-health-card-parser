# SMART Health Cards parser

A proof-of-concept parser for the [SMART Health Cards
format](https://smarthealth.cards/). This is not intended for production use. I
just hacked this together for a [blog
post](https://mikkel.ca/blog/digging-into-quebecs-proof-of-vaccination/), and
thought it might be handy.

**If you intend to adapt this code for production use, be aware that it does no
validation of the provided signature whatsoever. It is only intended to display
the data contained in the QRcode.**

## Setup

1. Ensure that your system is running PHP 7.4+.
2. Install [Composer](https://getcomposer.org/).
3. Run `composer install` in the project root directory.

## Usage

1. Use a QRcode app to scan the QRcode you want to parse.
2. Pipe the resultant string through the `php parse.php` command, for instance
   using one of the following commands:
  - `php parse.php < qrcode.txt # input from qrcode.txt in the same directory`
  - `pbpaste | php parse.php # paste from clipboard (Mac only)`
