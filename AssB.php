// Define function to get users by companyId
function getUsersByCompanyId($companyId) {
  // Define MySQL database connection details
  $servername = "localhost";
  $username = "username";
  $password = "password";
  $dbname = "database_name";

  // Create MySQL database connection
  $conn = new mysqli($servername, $username, $password, $dbname);

  // Check MySQL database connection
  if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
  }

  // Construct SQL query to select users by companyId
  $sql = "SELECT * FROM user WHERE companyId = ?";

  // Prepare SQL statement
  $stmt = $conn->prepare($sql);

  // Bind companyId parameter to SQL statement
  $stmt->bind_param("i", $companyId);

  // Execute SQL statement
  $stmt->execute();

  // Get query result
  $result = $stmt->get_result();

  // Fetch query result as associative array
  $users = $result->fetch_all(MYSQLI_ASSOC);

  // Close MySQL database connection and statement
  $stmt->close();
  $conn->close();

  // Return users that belong to the companyId
  return $users;
}
