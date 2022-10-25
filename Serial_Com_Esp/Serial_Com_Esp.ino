#include <ESP8266WiFi.h>
#include <WiFiClient.h> 
#include <ESP8266WebServer.h>
#include <ESP8266HTTPClient.h> 
#include <SoftwareSerial.h>
SoftwareSerial s(D7, D8);//rx,tx


int Led_OnBoard = 2;                  // Initialize the Led_OnBoard 

const char* ssid = "ANDROIDAP";                  // Your wifi Name       
const char* password = "linkondas15";          // Your wifi Password
  
const char *host = "192.168.43.130"; //Your pc or server (database) IP, example : 192.168.0.0 , if you are a windows os user, open cmd, then type ipconfig then look at IPv4 Address.

int data;
void setup() {
  // put your setup code here, to run once:
  s.begin(115200);
 // Serial.begin(9600);
  delay(1000);




  pinMode(Led_OnBoard, OUTPUT);       // Initialize the Led_OnBoard pin as an output
  Serial.begin(115200);
  WiFi.mode(WIFI_OFF);        //Prevents reconnection issue (taking too long to connect)
  delay(1000);
  WiFi.mode(WIFI_STA);        //This line hides the viewing of ESP as wifi hotspot
  
  WiFi.begin(ssid, password);     //Connect to your WiFi router
  Serial.println("");

  Serial.print("Connecting");
  // Wait for connection
  while (WiFi.status() != WL_CONNECTED) {
    digitalWrite(Led_OnBoard, LOW);
    delay(250);
    Serial.print(".");
    digitalWrite(Led_OnBoard, HIGH);
    delay(250);
  
}
  digitalWrite(Led_OnBoard, HIGH);
  //If connection successful show IP address in serial monitor
 Serial.println("");
 Serial.println("Connected to Network/SSID");
 Serial.print("IP address: ");
 Serial.println(WiFi.localIP());  //IP address assigned to your ESP
}

void loop() {
  // put your main code here, to run repeatedly: 
    digitalWrite(Led_OnBoard, HIGH);
    //s.write("s");
  if(s.available()>0){
      data=s.read();
     //Serial.println(data);
     // dataPass(data);
    
    HTTPClient http;    //Declare object of class HTTPClient
 
  String LdrValueSend, postData; 
  int ldrvalue=data;
 // int ldrvalue=analogRead(A0);  //Read Analog value of LDR
  LdrValueSend = String(ldrvalue);   //String to interger conversion
 
  //Post Data
  postData = "ldrvalue=" + LdrValueSend;
  
  http.begin("http://192.168.43.130/finalyear27/admin/insertdb.php");              //Specify request destination
  http.addHeader("Content-Type", "application/x-www-form-urlencoded");    //Specify content-type header
 
  int httpCode = http.POST(postData);   //Send the request//send korse data re
  String payload = http.getString();    //Get the response payload//load oiya abar return korse

  //Serial.println("LDR Value=" + ldrvalue);
  Serial.println(httpCode);   //Print HTTP return code
  Serial.println(payload);    //Print request response payload
  Serial.println("LDR Value=" + LdrValueSend);
  
  http.end();  //Close connection

  delay(4000);  //Here there is 4 seconds delay plus 1 second delay below, so Post Data at every 5 seconds
  digitalWrite(Led_OnBoard, LOW);
  delay(1000);
  digitalWrite(Led_OnBoard, HIGH);

    
    
    
    
    }

    
//    Serial.println(data);
}
