Feature: Router
  In order to handle HTTP requests
  As a developer
  I need to ensure the router dispatches requests correctly

  Scenario: Dispatching a valid route
    Given I have a route "GET /home" that maps to "App\Controllers\HomeController@index"
    When I make a "GET" request to "/home"
    Then the response status code should be 200
    And the response body should contain "Welcome to the Home page!"

  Scenario: Dispatching an invalid route
    When I make a "GET" request to "/non-existent"
    Then the response status code should be 404
    And the response body should contain "Not Found"