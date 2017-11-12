# CMS-Chemical-management-system
This just a coursework project
Folder that doesn't need to be touch!(Template Default css&js)
-- bower_components
--build
--dist
--plugins

other than these can be modified.
Please pull first before push!

## API
There are two types of API endpoints that can be consumed in this project, namely the public one at _/api.php_ and the authenticated one at _/authapi.php_. Each of the request to the authenticated API endpoint must have an `Authorization` header with the contents of the JWT token.
Example request to authenticated endpoints:
```
GET /authapi.php/chemical?chemicalid=1 HTTP/1.1
Host: yourhost.com
Connection: keep-alive
Accept: */*
Authorization: eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJpYXQiOjE0MjU1ODg4MjEsImp0aSI6IjU0ZjhjMjU1NWQyMjMiLCJpc3MiOiJzcC1qd3Qtc2ltcGxlLXRlY25vbTFrMy5jOS5pbyIsIm5iZiI6MTQyNTU4ODgyMSwiZXhwIjoxNDI1NTkyNDIxLCJkYXRhIjp7InVzZXJJZCI6IjEiLCJ1c2VyTmFtZSI6ImFkbWluIn19.HVYBe9xvPD8qt0wh7rXI8bmRJsQavJ8Qs29yfVbY-A0
```
__However, for development purpose all authenticated endpoints listed below can be consumed directly from public endpoints as well.__

## API Authentication

The JWT token needed for `Authorization` header can be obtained from the following endpoints:
### Login
  _Login through user account credentials to obtain JWT token_

* **URL**

  _/api.php/login_

* **Method:**

  `POST`

* **Data Params**

   **Required:**
 
   `identifyid=[string]`
   
   `password=[string]`

* **Success Response:**

  * **Code:** 200 <br />
    **Content:** 
    ```json
    {
        "token": "eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJ1c2VyaWQiOjEwMH0.jgRZpl3CBtY_kl6Ljj16D4BY7k7QtLFb-0Zo4YLy_GI",
        "userid": 100,
        "fname": "admin",
        "lname": "admin",
        "email": "abcd@gmail.com",
        "telno": "2012140-4219",
        "role": "Lecturer",
        "admin": "Yes",
        "identifyid": "admin"
	}
    ```
 
* **Error Response:**

  * **Code:** 401 UNAUTHORIZED <br />
    **Content:** 
    ```json
    {
        "exception": {
            "type": "UnauthorizedException",
            "message": "Invalid Credentials",
            "code": 401
        }
    }
    ```
    
  * **Code:** 401 UNAUTHORIZED <br />
   **Content:** 
      ```json
      {
          "exception": {
              "type": "UnauthorizedException",
              "message": "Account Access Pending",
              "code": 401
          }
      }
   	 ```
  * **Code:** 500 INTERNAL SERVER ERROR <br />
   **Content:** 
      ```json
      {
          "exception": {
              "type": "InternalServerErrorException",
              "message": "Error In login Method User API",
              "code": 500
          }
      }
   	 ```   
## Authenticated Endpoints
### chemicalqrcode
  _Get chemicalin information using qrcode_

* **URL**

  _/authapi.php/chemicalqrcode?qrcode=12345_

* **Method:**

  `GET`

* **URL Params**

   **Required:**
 
   `qrcode=[string]`

### updateChemicalinStatus
  _Update chemicalin status using ciid_

* **URL**

  _/authapi.php/updateChemicalinStatus_

* **Method:**

  `POST`

* **URL Params**

   **Required:**
 
   `ciid=[string]`
   
   `status=[string]`

### studentsUnderSupervision
  _Get students list registered under user's supervion_

* **URL**

  _/authapi.php/studentsUnderSupervision?userid=12345_

* **Method:**

  `GET`

* **URL Params**

   **Required:**
 
   `userid=[string]`
   
### updateStudentStatus
  _Update student status(role) using userid_

* **URL**

  _/authapi.php/updateChemicalinStatus_

* **Method:**

  `POST`

* **URL Params**

   **Required:**
 
   `userid=[string]`
   
   `role=[string]`
   
### chemicals
  _Get the list of all chemicals_

* **URL**

  _/authapi.php/chemicals_

* **Method:**

  `GET`
  
### chemical
  _Get a chemical using chemicalid_

* **URL**

  _/authapi.php/chemical?chemicalid=12345_

* **Method:**

  `GET`

* **URL Params**

   **Required:**
 
   `chemicalid=[string]`
   
### labs
  _Get the list of all labs_

* **URL**

  _/authapi.php/labs_

* **Method:**

  `GET`
  
### lab
  _Get a lab using labid_

* **URL**

  _/authapi.php/lab?labid=12345_

* **Method:**

  `GET`

* **URL Params**

   **Required:**
 
   `labid=[string]`
   
### labowners
  _Get the list of all labowners_

* **URL**

  _/authapi.php/labowners_

* **Method:**

  `GET`
  
### labownerbylab
  _Get a labowner using labid_

* **URL**

  _/authapi.php/labownerbylab?labid=12345_

* **Method:**

  `GET`

* **URL Params**

   **Required:**
 
   `labid=[string]`
   
### labownerbystaff
  _Get a labowner using staffid

* **URL**

  _/authapi.php/labownerbystaff?staffid=12345_

* **Method:**

  `GET`

* **URL Params**

   **Required:**
 
   `staffid=[string]`
   
### staffs
  _Get the list of all staffs_

* **URL**

  _/authapi.php/staffs_

* **Method:**

  `GET`
  
### staff
  _Get a staff using staffid_

* **URL**

  _/authapi.php/staff?staffid=12345_

* **Method:**

  `GET`

* **URL Params**

   **Required:**
 
   `staffid=[string]`


