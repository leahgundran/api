# API Name

API Name: API ni Joanna Marie and Leah

 


## API
Description

It is a set of rules and protocols that allow different software applications to communicate with each other. APIs define the methods and data formats that applications can use to request and exchange information. They serve as intermediaries that enable different software systems to work together, share data, and perform various tasks.


 


## API
Endpoints

Endpoint: An endpoint is a specific URL or URI (Uniform Resource Identifier) that the API provides for accessing a particular resource or service. Each endpoint is associated with a specific function or set of functions.

Function: The function of an endpoint refers to what the API does when you make a request to that URL. This can include actions like retrieving data, creating new data, updating existing data, or deleting data.

Required Parameters: When you make a request to an API endpoint, you typically need to provide certain parameters to specify what you want to do or which data you want to access. These parameters can vary, but some common ones include:

HTTP Method: The HTTP method used in the request, such as GET, POST, PUT, DELETE, etc. Each method corresponds to a different action (e.g., GET for retrieving data, POST for creating data).

API Key or Authentication: Many APIs require an API key or some form of authentication to ensure that only authorized users can access their services.

Path Parameters: These are part of the URL path and often used to specify the resource or entity you want to interact with. For example, in the URL /users/123, "123" is a path parameter indicating the user with ID 123.

Query Parameters: These are additional parameters provided in the URL's query string (after a ?), used to further refine the request, filter data, or control the behavior of the API. For instance, in the URL /products?category=electronics, "category" is a query parameter.

Request Body: When creating or updating data, you might need to send data in the request body, typically in JSON or XML format. This data provides the details for the new or updated resource.

 


## Request
Payload

For the /postName endpoint, the request payload should be a JSON object containing fname and lname. 
For example:
{
    "lname": "Hortizuela",
    "fname": "Manny"
}

For the /updateName endpoint, the request payload should include the id of the name to be updated along with the new fname and lname.
For example:
{
  "id":1,
  "lname":"wick",
   "fname":"john"
}

For the /deleteName endpoint, the request payload should include the id of the name to be deleted.
For example:
{
  "id":1
}

 


## Response
API Response:

The response for most endpoints contains a JSON object with a status field (either "success" or "error") and a data field. The structure of the data field varies based on the specific endpoint.

For /postName:
{
    "status": "success",
    "data": null
}

For /getName:
{
    "status": "success",
    "data": [
        {"lname": "Hortizuela", "fname": "Manny"},
        {"lname": "Licayan", "fname": "Arnold"}
    ]
}


For /updateName:
{
         "status":"success","data":null
}

For /deleteName:
{
         "status":"success","data":null
}



 


## Response

To retrieve a greeting with a concatenated full name, make a GET request to /getName/{lname}/{fname}.
To add a new name, make a POST request to /postName with a JSON payload containing fname and lname.
To retrieve a list of names, make a GET request to /getName.
To update an existing name, make a POST request to /updateName with a JSON payload containing id, fname, and lname.
To delete a name, make a POST request to /deleteName with a JSON payload containing id.
 


## Usage


Provide code examples or instructions on how to use your API.
To retrieve a greeting with a concatenated full name, make a GET request to /getName/{lname}/{fname}.

To add a new name, make a POST request to /postName with a JSON payload containing fname and lname.

To retrieve a list of names, make a GET request to /getName.

To update an existing name, make a POST request to /updateName with a JSON payload containing id, fname, and lname.

To delete a name, make a POST request to /deleteName with a JSON payload containing id.

 


## License
No license

 


## Contributors


List contributors or give credit to any external libraries or resources used.
Leah Gundran, Joana Marie Fabro, Manny Hortizuela

 


## Contact
Information
joanamarie.fabro@student.dmmmsu.edu.ph

Include contact information for inquiries or support.
