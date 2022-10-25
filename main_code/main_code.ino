/***************************************************
  This is an example sketch for our optical Fingerprint sensor

  Designed specifically to work with the Adafruit BMP085 Breakout
  ----> http://www.adafruit.com/products/751

  These displays use TTL Serial to communicate, 2 pins are required to
  interface
  Adafruit invests time and resources providing this open source code,
  please support Adafruit and open-source hardware by purchasing
  products from Adafruit!

  Written by Limor Fried/Ladyada for Adafruit Industries.
  BSD license, all text above must be included in any redistribution
 ****************************************************/


#include <Adafruit_Fingerprint.h>
#include <SoftwareSerial.h>

#include <LiquidCrystal.h>
int getFingerprintIDez();
int m;
uint8_t getFingerprintEnroll();
// pin #2 is IN from sensor (GREEN wire)
// pin #3 is OUT from arduino  (WHITE wire)
SoftwareSerial mySerial(10, 11);//rx,tx

Adafruit_Fingerprint finger = Adafruit_Fingerprint(&mySerial);

// On Leonardo/Micro or others with hardware serial, use those! #0 is green wire, #1 is white
//Adafruit_Fingerprint finger = Adafruit_Fingerprint(&Serial1);
LiquidCrystal lcd(2, 3, 4, 5, 6, 7);
int FingerMode = 0 ;
int SkipHead = 0;

uint8_t id;
void setup()
{
  pinMode(8, INPUT_PULLUP);  //yellow delete
  pinMode(9, INPUT_PULLUP);  //orange finger detect
  pinMode(12, INPUT_PULLUP);  //white enroll

  //  pinMode(8, OUTPUT);   //relay
  //  pinMode(9, OUTPUT);
  //  digitalWrite(8, HIGH);
  //  digitalWrite(9, HIGH);

  //  lcd.begin();                      // initialize the lcd
  // lcd.backlight();  //default backlight on


  while (!Serial);  // For Yun/Leo/Micro/Zero/...
  delay(500);
  Serial.begin(115200);
  Serial1.begin(115200);
  lcd.begin(16, 2);
  lcd.clear();
  lcd.print("finger detect");
  delay(100);
  // set the data rate for the sensor serial port
  // finger.begin(19200);
  finger.begin(57600);

  if (finger.verifyPassword()) {
    //lcd.print("Found fingerprint!");
  } else {
    // lcd.print("Did not find fingerprint sensor :(");
    while (1);
  }
}

void loop()                     // run over and over again
{

  //Serial.println("hggfhv");


  if (digitalRead(8) == HIGH ) {
    //    delay(10);
    //    if (digitalRead(10) == LOW )

    FingerMode = 2; SkipHead = 0; //delete
  }

  if (digitalRead(9) == HIGH ) {
    //    delay(10);
    //    if (digitalRead(11) == LOW )
    FingerMode = 0; SkipHead = 0; //finger
  }

  if (digitalRead(12) == HIGH ) {
    //    delay(10);
    //    if (digitalRead(12) == LOW )

    FingerMode = 1; SkipHead = 0; //enroll
  }
  //Serial.println("FingerMode"); Serial.print(FingerMode); Serial.println();
  switch (FingerMode) {
    case 1:
      {
        if (SkipHead == 0)
        {

          int finger = 1;
          int sum = downloadFingerprintTemplate(finger);
          Serial.println(sum);

          id = sum+1;
          lcd.clear();
          lcd.setCursor(0, 0);
          lcd.print("Enrolling Mode");
        }

        lcd.setCursor(0, 1);
        
        getFingerprintEnroll();
        delay(2000);

        lcd.setCursor(0, 1);
        lcd.print("                ");
        lcd.setCursor(0, 1);
        //          id = 2;
        //          lcd.print("Wait enroll ID#");
        //          lcd.print(id);
        //          delay(1000);
        //          getFingerprintEnroll();
        //          delay(1000);
        //          lcd.setCursor(0, 1);
        //          lcd.print("                ");
        //          lcd.setCursor(0, 1);
        //          id = 3;
        //          lcd.print("Wait enroll ID#");
        //          lcd.print(id);
        //          delay(1000);
        //          getFingerprintEnroll();
        //          delay(1000);
        FingerMode = 0;
      }
      break;
    case 2:
      {
        if (SkipHead == 0)
        {
          lcd.clear();
          lcd.setCursor(0, 0);
          lcd.print("Delete Mode");
        }
        for (int i = 0; i < 127; i++)
        {
          deleteFingerprint(i);
          lcd.print("Deleted");
        }

        FingerMode = 0;
      }
      break;
    default:
      {
        if (SkipHead == 0)
        {
          lcd.clear();
          lcd.setCursor(0, 0);
          lcd.print("Place");
          lcd.setCursor(0, 1);
          lcd.print("your Finger..!");
        }
        SkipHead = 1;
        lcd.setCursor(0, 1);
        getFingerprintIDez();


      }
      break;
  }




  // delay(50);            //don't ned to run this at full speed.
}

uint8_t getFingerprintID() {
  uint8_t p = finger.getImage();
  switch (p) {
    case FINGERPRINT_OK:
      // lcd.setCursor(0, 1);
      // lcd.print("Image taken");
      break;
    case FINGERPRINT_NOFINGER:
      //Serial.println("No finger detected");
      return p;
    case FINGERPRINT_PACKETRECIEVEERR:
      //Serial.println("Communication error");
      return p;
    case FINGERPRINT_IMAGEFAIL:
      //Serial.println("Imaging error");
      return p;
    default:
      //Serial.println("Unknown error");
      return p;
  }

  // OK success!

  p = finger.image2Tz();
  switch (p) {
    case FINGERPRINT_OK:
      //Serial.println("Image converted");
      break;
    case FINGERPRINT_IMAGEMESS:
      //Serial.println("Image too messy");
      return p;
    case FINGERPRINT_PACKETRECIEVEERR:
      //Serial.println("Communication error");
      return p;
    case FINGERPRINT_FEATUREFAIL:
      //Serial.println("Could not find fingerprint features");
      return p;
    case FINGERPRINT_INVALIDIMAGE:
      //Serial.println("Could not find fingerprint features");
      return p;
    default:
      //Serial.println("Unknown error");
      return p;
  }

  // OK converted!
  p = finger.fingerFastSearch();
  if (p == FINGERPRINT_OK) {
    //Serial.println("Found a print match!");
  } else if (p == FINGERPRINT_PACKETRECIEVEERR) {
    //Serial.println("Communication error");
    return p;
  } else if (p == FINGERPRINT_NOTFOUND) {
    //Serial.println("Did not find a match");
    return p;
  } else {
    // Serial.println("Unknown error");
    return p;
  }

  // found a match!

  //Serial.print("Found ID #"); Serial.print(finger.fingerID);
  // Serial.print(" with confidence of "); Serial.println(finger.confidence);
}

// returns -1 if failed, otherwise returns ID #
int getFingerprintIDez() {//match the finger which is already inserted in database


  uint8_t p = finger.getImage();
  if (p != FINGERPRINT_OK) {
    //  Serial.println(p);
    // not place finger
    return -1;
  }

  p = finger.image2Tz();
  if (p != FINGERPRINT_OK)  {
    //Serial.println(p);
    return -1;
  }

  p = finger.fingerFastSearch();
  if (p != FINGERPRINT_OK)
  {
    if (p > 2) {
      lcd.clear();
      lcd.setCursor(0, 0);
      lcd.print("the result is...");
      lcd.setCursor(0, 1);
      lcd.print("Not Found");
      delay(1500);
      lcd.clear();
      lcd.setCursor(0, 0);
      lcd.print("Place");
      lcd.setCursor(0, 1);
      lcd.print("your Finger..!");
      return -1;

    } else {
      //Serial.println(p); return -1;
    }
  }

  // found a match!
  lcd.clear();
  lcd.setCursor(0, 0);
  lcd.print("the result is..");
  lcd.setCursor(0, 1);
  lcd.print("Found ID #"); lcd.print(finger.fingerID);

  int data = finger.fingerID;
  Serial.println(finger.fingerID);

  if (Serial1.available() > 0)
  {

    char c = Serial1.read();
    //if (c == 's')
    //{
    //Serial.write(finger.fingerID);
    Serial1.write(data);
    //}
  }

  //   int data=finger.fingerID;
  //      Serial.println(data);



  delay(1500);
  lcd.clear();
  lcd.setCursor(0, 0);
  lcd.print("Place");
  lcd.setCursor(0, 1);
  lcd.print("your Finger..!");
  // Serial.print(" with confidence of "); Serial.println(finger.confidence);
  return finger.fingerID;
}

uint8_t deleteFingerprint(uint8_t id) {//clear the database
  uint8_t p = -1;

  p = finger.deleteModel(id);

  if (p == FINGERPRINT_OK) {
    lcd.setCursor(0, 1);
    lcd.print("             ");
    lcd.setCursor(0, 1);
    // lcd.print("Deleted! #");
    // lcd.print(id);
    //Serial.println(); Serial.print("Deleted! #"); Serial.print(id); Serial.println();
  } else if (p == FINGERPRINT_PACKETRECIEVEERR) {
    //Serial.println("Communication error");
    return p;
  } else if (p == FINGERPRINT_BADLOCATION) {
    //Serial.println("Could not delete in that location");
    return p;
  } else if (p == FINGERPRINT_FLASHERR) {
    //Serial.println("Error writing to flash");
    return p;
  } else {
    //Serial.print("Unknown error: 0x"); Serial.println(p, HEX);
    return p;
  }
}

uint8_t getFingerprintEnroll() {//add new person

  int p = -1;
  //Serial.print("Waiting for valid finger to enroll as #"); Serial.println(id);
  lcd.setCursor(0, 1);
  lcd.print("                ");
  lcd.setCursor(0, 1);
  lcd.print("Place finger #"); lcd.print(id);
  lcd.blink();
  while (p != FINGERPRINT_OK) {
    p = finger.getImage();
    switch (p) {
      case FINGERPRINT_OK:
        //Serial.println("Image taken");
        break;
      case FINGERPRINT_NOFINGER:
        lcd.blink();
        //Serial.println(".");
        break;
      case FINGERPRINT_PACKETRECIEVEERR:
        //Serial.println("Communication error");
        break;
      case FINGERPRINT_IMAGEFAIL:
        //Serial.println("Imaging error");
        break;
      default:
        //Serial.println("Unknown error");
        break;
    }
  }

  // OK success!

  p = finger.image2Tz(1);
  switch (p) {
    case FINGERPRINT_OK:

      //Serial.println("Image converted");
      lcd.setCursor(0, 1);
      lcd.print("               ");
      lcd.setCursor(0, 1);

      lcd.print("Image converted");
      delay(500);
      break;
    case FINGERPRINT_IMAGEMESS:
      // Serial.println("Image too messy");
      return p;
    case FINGERPRINT_PACKETRECIEVEERR:
      //Serial.println("Communication error");
      return p;
    case FINGERPRINT_FEATUREFAIL:
      //Serial.println("Could not find fingerprint features");
      return p;
    case FINGERPRINT_INVALIDIMAGE:
      //Serial.println("Could not find fingerprint features");
      return p;
    default:
      //  Serial.println("Unknown error");
      return p;
  }

  //Serial.println("Remove finger");
  lcd.setCursor(0, 1);
  lcd.print("                ");
  lcd.setCursor(0, 1);
  lcd.print("Remove finger");
  delay(2000);
  p = 0;
  while (p != FINGERPRINT_NOFINGER) {
    p = finger.getImage();
  }
  //Serial.print("ID "); Serial.println(id);
  p = -1;
  //Serial.println("Place same finger again");
  lcd.setCursor(0, 1);
  lcd.print("                ");
  lcd.setCursor(0, 1);
  lcd.print("Place same again!");

  while (p != FINGERPRINT_OK) {
    p = finger.getImage();
    switch (p) {
      case FINGERPRINT_OK:
        //   Serial.println("Image taken");
        break;
      case FINGERPRINT_NOFINGER:
        // Serial.print(".");
        break;
      case FINGERPRINT_PACKETRECIEVEERR:
        //Serial.println("Communication error");
        break;
      case FINGERPRINT_IMAGEFAIL:
        //Serial.println("Imaging error");
        break;
      default:
        //Serial.println("Unknown error");
        break;
    }
  }

  // OK success!

  p = finger.image2Tz(2);
  switch (p) {
    case FINGERPRINT_OK:
      //  Serial.println("Image converted");
      break;
    case FINGERPRINT_IMAGEMESS:
      //Serial.println("Image too messy");
      return p;
    case FINGERPRINT_PACKETRECIEVEERR:
      //Serial.println("Communication error");
      return p;
    case FINGERPRINT_FEATUREFAIL:
      //Serial.println("Could not find fingerprint features");
      return p;
    case FINGERPRINT_INVALIDIMAGE:
      //Serial.println("Could not find fingerprint features");
      return p;
    default:
      //Serial.println("Unknown error");
      return p;
  }

  // OK converted!
  //Serial.print("Creating model for #");  Serial.println(id);

  p = finger.createModel();
  if (p == FINGERPRINT_OK) {
    //  Serial.println("Prints matched!");
  } else if (p == FINGERPRINT_PACKETRECIEVEERR) {
    //  Serial.println("Communication error");
    return p;
  } else if (p == FINGERPRINT_ENROLLMISMATCH) {
    // Serial.println("Fingerprints did not match");
    return p;
  } else {
    //  Serial.println("Unknown error");
    return p;
  }

  //Serial.print("ID "); Serial.println(id);
  lcd.noBlink();
  p = finger.storeModel(id);
  if (p == FINGERPRINT_OK) {
    lcd.setCursor(0, 1);
    lcd.print("                ");
    lcd.setCursor(0, 1);
    lcd.print("Stored! #");
    lcd.print(id);
    //  Serial.println("Stored!");
  } else if (p == FINGERPRINT_PACKETRECIEVEERR) {
    // Serial.println("Communication error");
    return p;
  } else if (p == FINGERPRINT_BADLOCATION) {
    // Serial.println("Could not store in that location");
    return p;
  } else if (p == FINGERPRINT_FLASHERR) {
    // Serial.println("Error writing to flash");
    return p;
  } else {
    //  Serial.println("Unknown error");
    return p;
  }
}
uint8_t downloadFingerprintTemplate(uint16_t id) {

  int c = 0;
  for (int id = 1; id < 10; id++) {

    uint8_t p = finger.loadModel(id);
    if (p == FINGERPRINT_OK)
    {
      c++;
    }
    else {
      // Serial.print(id); Serial.println(" error:");
    }

  }
  return c;
}
