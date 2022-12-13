<?php


define('HOSTNAME', 'localhost');
define('USERNAME', 'root');
define('PASSWORD', '');
define('DATABASE', 'fpoly_teacher_tool');
define('PORT', '2003');


// define('HOSTNAME', 'localhost');
// define('USERNAME', 'ihzwudyw_app');
// define('PASSWORD', '160723Thao@');
// define('DATABASE', 'ihzwudyw_app');
// define('PORT', '3306');


class Database
{
  private $conn;


  function connect()
  {
    if (!$this->conn) {
      try {
        $this->conn = mysqli_connect(HOSTNAME, USERNAME, PASSWORD, DATABASE, PORT);
        mysqli_query($this->conn, "set names 'utf8'");
      } catch (Exception $e) {
        error('503');
        die();
      }
    }
  }



  function dis_connect()
  {
    if ($this->conn) {
      mysqli_close($this->conn);
    }
  }


  function query($sql)
  {
    $this->connect();
    $row = $this->conn->query($sql);
    return $row;
  }



  function insert($table, $data)
  {
    $this->connect();
    $field_list = '';
    $value_list = '';
    foreach ($data as $key => $value) {
      $field_list .= ",$key";
      $value_list .= ",'" . mysqli_real_escape_string($this->conn, $value) . "'";
    }
    $sql = 'INSERT INTO ' . $table . '(' . trim($field_list, ',') . ') VALUES (' . trim($value_list, ',') . ')';

    return mysqli_query($this->conn, $sql);
  }



  function settings($data)
  {
    $this->connect();

    $row = $this->conn->query("SELECT * FROM `settings` LIMIT 1")->fetch_array();
    if ($row) {
      return $row[$data];
    }
    return false;
  }



  function getInfoTeacher($data)
  {
    $this->connect();
    if (isset($_SESSION['email'])) {
      $row = $this->conn->query(
        "SELECT * FROM `teachers`INNER JOIN `co_so` on co_so.id_coso = teachers.id_coso WHERE `email` = '" . $_SESSION['email'] . "' "
      )->fetch_array();
      if ($row) {
        return $row[$data];
      }
      return false;
    }
    return false;
  }

  function getDetailDiem($id, $data)
  {
    $this->connect();
    $row = $this->conn->query("SELECT * FROM `diem_sv`
  
     WHERE id = '$id' ")->fetch_array();
    if ($row) {
      return $row[$data];
    }
    return false;
  }



  function update($table, $data)
  {
    $this->connect();
    $sql = '';
    foreach ($data as $key => $value) {
      $sql .= "$key = '" . mysqli_real_escape_string($this->conn, $value) . "',";
    }
    $sql = 'UPDATE ' . $table . ' SET ' . trim($sql, ',');
    return mysqli_query($this->conn, $sql);
  }


  function update_value($table, $data, $where)
  {
    $this->connect();
    $sql = '';
    foreach ($data as $key => $value) {
      $sql .= "$key = '" . mysqli_real_escape_string($this->conn, $value) . "',";
    }
    $sql = 'UPDATE ' . $table . ' SET ' . trim($sql, ',') . ' WHERE ' . $where;
    return mysqli_query($this->conn, $sql);
  }

  function remove($table, $where)
  {
    $this->connect();
    $sql = "DELETE FROM $table WHERE $where";
    return mysqli_query($this->conn, $sql);
  }




  function get_list($sql)
  {
    $this->connect();
    $result = mysqli_query($this->conn, $sql);
    if (!$result) {
      error('503') or die('Error');
    }
    $return = array();
    while ($row = mysqli_fetch_assoc($result)) {
      $return[] = $row;
    }
    mysqli_free_result($result);
    return $return;
  }

  function get_row($sql)
  {
    $this->connect();
    $result = mysqli_query($this->conn, $sql);
    if (!$result) {
      error('503') or die('Error');
    }
    $row = mysqli_fetch_assoc($result);
    mysqli_free_result($result);
    if ($row) {
      return $row;
    }
    return false;
  }


  function check_teacher()
  {
    # code...
  }

  function num_rows($sql)
  {


    $this->connect();
    $result = mysqli_query($this->conn, $sql);
    if (!$result) {
      error('503') or die('Error');
    }
    $row = mysqli_num_rows($result);
    mysqli_free_result($result);
    if ($row) {
      return $row;
    }
    return 0;
  }
}
