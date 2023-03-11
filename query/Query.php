<?php
ob_start();
session_start();
include("database/Connect.php");
class Query extends Connect {
    public $result, $msg, $now,
    $count, $countR, $countT,
    $login, $role, $user,
    $username;
    
    public function login($data) {
        $username = htmlspecialchars($data["username"]);
        $password = htmlspecialchars($data["password"]);
        $remember = htmlspecialchars($data["remember"]);
        
        $this->select("SELECT * FROM tbl_users WHERE username = '$username'");
        $row = mysqli_fetch_object($this->result);
        
        if (empty($username) || empty($password)) {
            $this->msg = "Isi bidang yang kosong.";
            return $this->msg;  
        } else {
            if (mysqli_num_rows($this->result) < 1) {
                $this->msg = "Akun tidak ada!.";
                return $this->msg;
            } else if (!password_verify($password, $row->password)) {
                $this->msg = "Password salah!.";
                return $this->msg;
            }  else if (empty($remember)) {
                $_SESSION['$Cu&&r%e'] = md5($row->username);
                $_SESSION['$Nd&&a%ee'] = md5($row->name);
                $_SESSION['$Rp&&L%e'] = md5($row->role);
                $this->addlog("Login");
                ($row->role === "admin") ? header("Location: index.php?page=dashboard&q=statistic&type=success&msg=Berhasil login sebagai $row->username") : header("Location: index.php?type=success&msg=Berhasil login sebagai $row->username");
            } else {
                $_SESSION['$Cu&&r%e'] = md5($row->username);
                $_SESSION['$Nd&&a%ee'] = md5($row->name);
                $_SESSION['$Rp&&L%e'] = md5($row->role);
                
                setcookie('$Cu&&r%e', md5($row->username), time() + (86400 * 30));
                setcookie('$Nd&&a%ee', md5($row->name), time() + (86400 * 30));
                setcookie('$Rp&&L%e', md5($row->role), time() + (86400 * 30)); //86400 1 hari
                $this->addlog("Login");
                ($row->role === "admin") ? header("Location: index.php?page=dashboard&q=statistic&type=success&msg=Berhasil login sebagai $row->username") : header("Location: index.php?type=success&msg=Berhasil login sebagai $row->username");
            }
        }
    }
   
    
    public function logout() {
        $this->addlog("Logout");
        $_SESSION['$Cu&&r%e'] = "";
        $_SESSION['$Nd&&a%ee'] = "";
        $_SESSION['$Rp&&L%e'] = "";
        
        setcookie('$Cu&&r%e', md5($row->username), time() - 360);
        setcookie('$Nd&&a%ee', md5($row->name), time() - 360);
        setcookie('$Rp&&L%e', md5($row->role), time() - 360);
        
        session_destroy();
        header("Location: index.php?type=success&msg=Berhasil Logout");
    }
    
    public function checkLogin() {
        $username_s = (isset($_SESSION['$Cu&&r%e'])) ? $_SESSION['$Cu&&r%e'] : "";
        $name_s = (isset($_SESSION['$Nd&&a%ee'])) ? $_SESSION['$Nd&&a%ee'] : "";
        $role_s = (isset($_SESSION['$Rp&&L%e'])) ? $_SESSION['$Rp&&L%e'] : "";
      
        $username_c = (isset($_COOKIE['$Cu&&r%e'])) ? $_COOKIE['$Cu&&r%e'] : "";
        $name_c = (isset($_COOKIE['$Nd&&a%ee'])) ? $_COOKIE['$Nd&&a%ee'] : "";
        $role_c = (isset($_COOKIE['$Rp&&L%e'])) ? $_COOKIE['$Rp&&L%e'] : "";
        
        $this->select("SELECT * FROM tbl_users WHERE md5(username) = '$username_s'");
        $row = mysqli_fetch_object($this->result);
      
        if (!empty($username_s) && !empty($name_s) && !empty($role_s)) {
            if ($name_s == md5($row->name) && $role_s == md5($row->role)) {
                $this->login = true;
                $this->user = explode(" ", $row->name);
                $this->user = $this->user[0];
                $this->username = $row->username;
                return $this->user;
                return $this->username;
                return $this->login;
            } else {
                $this->login = false;
                return $this->login;
            }
        } else {
            if (md5($row->name) == $name_c && md5($row->role) == $role_c) {
                $_SESSION['$Cu&&r%e'] = md5($row->username);
                $_SESSION['$Nd&&a%ee'] = md5($row->name);
                $_SESSION['$Rp&&L%e'] = md5($row->role);
 
                $this->login = true;
                $this->user = explode(" ", $row->name);
                $this->user = $this->user[0];
                $this->username = $row->username;
                return $this->username;
                return $this->user;
                return $this->login;
            } else {
                $this->login = false;
                return $this->login;
            }
        }
    }
    
    public function checkRole() {
        $username_s = (isset($_SESSION['$Cu&&r%e'])) ? $_SESSION['$Cu&&r%e'] : "";
 
        $this->select("SELECT * FROM tbl_users WHERE md5(username) = '$username_s'");
        $row = mysqli_fetch_object($this->result);
      
        $this->role = $row->role;
        return $this->role;
    }

    public function select($query) {
        $this->result= mysqli_query($this->db, $query);
        return $this->result;
    }
    
    public function addlog($log) {
        $username_s = (isset($_SESSION['$Cu&&r%e'])) ? $_SESSION['$Cu&&r%e'] : "";
 
        $this->select("SELECT * FROM tbl_users WHERE md5(username) = '$username_s'");
        $row = mysqli_fetch_object($this->result);
      
        $nama= $row->name;
        $stmt= $this->db->prepare("INSERT INTO tbl_log(nama, log) VALUES (?, ?)");
        $stmt->bind_param("ss", $nama, $log);
        $stmt->execute();
    }
    
    public function getCount() {
        $this->count = $this->select("SELECT COUNT(id) FROM tbl_piket");
        $this->count = mysqli_fetch_assoc($this->count);
        $this->count =  $this->count["COUNT(id)"];
        return $this->count;
    }
    
    public function getCountR() {
        $this->countR = $this->select("SELECT COUNT(id) FROM tbl_piket WHERE status = 1");
        $this->countR = mysqli_fetch_assoc($this->countR);
        $this->countR =  $this->countR["COUNT(id)"];
        return $this->countR;
    }
    
    public function getCountT() {
        $this->countT = $this->select("SELECT COUNT(id) FROM tbl_piket WHERE status = 0");
        $this->countT = mysqli_fetch_assoc($this->countT);
        $this->countT =  $this->countT["COUNT(id)"];
        return $this->countT;
    }
    
    public function addCountNotPiket($absen, $status) {
        $this->select("SELECT jumlah_tidak_piket FROM tbl_siswa WHERE absen = $absen");
        $row = mysqli_fetch_object($this->result);
        if ($status === "1") {
            $row = $row->jumlah_tidak_piket;
        } else {
            $row = $row->jumlah_tidak_piket + 1;
        }
        
        $stmt = $this->db->prepare("UPDATE tbl_siswa SET jumlah_tidak_piket = ? WHERE absen = $absen");
        $stmt->bind_param("i", $row);
        $stmt->execute();
    }
    
    public function addCountPiket($absen, $status) {
        $this->select("SELECT jumlah_piket FROM tbl_siswa WHERE absen = $absen");
        $row = mysqli_fetch_object($this->result);
        if ($status === "1") {
            $row = $row->jumlah_piket + 1;
        } else {
            $row = $row->jumlah_piket;
        }
        
        $stmt = $this->db->prepare("UPDATE tbl_siswa SET jumlah_piket = ? WHERE absen = $absen");
        $stmt->bind_param("i", $row);
        $stmt->execute();
    }

    public function addPiket($data) {
        $this->checkrole();
        $re = ($this->role === "admin") ? "dashboard&q=piket" : "piket";
        $hari= htmlspecialchars($data["hari"]);
        $waktu= htmlspecialchars($data["waktu"]);
        $absen= htmlspecialchars($data["absen"]);
        $status= htmlspecialchars($data["status"]);
        $keterangan= htmlspecialchars($data["keterangan"]);
        
        $stmt= $this->db->prepare("INSERT INTO tbl_piket(hari, waktu, absen, status, keterangan) VALUES(?, ?, ?, ?, ?)");
        $stmt->bind_param("ssiss", $hari, $waktu, $absen, $status, $keterangan);
        
        if (empty($hari) || empty($waktu) || empty($absen)) {
            $this->msg= "Isi bidang yang kosong!.";
            return $this->msg;
        } else {
            if ($stmt->execute()) {
                $this->addlog("Menambahkan data piket [$absen]");
                $this->addCountPiket($absen, $status);
                $this->addCountNotPiket($absen, $status);
                header ("Location: index.php?page=$re&type=success&msg=Data piket baru berhasil ditambahkan.");
            } else {
                $this->msg= "Data gagal ditambahkan.";
                return $this->msg;
            }
        }
    }
    
    public function addAkun($data) {
        $name = htmlspecialchars($data["name"]);
        $username = htmlspecialchars($data["username"]);
        $password = htmlspecialchars($data["password"]);
        $role = htmlspecialchars($data["role"]);
        $password = password_hash($password, PASSWORD_DEFAULT);
        
        $this->select("SELECT * FROM tbl_users WHERE username = '$username'");
        
        if (empty($name) || empty($username) || empty($password) || empty($role)) {
            $this->msg= "Isi bidang yang kosong!.";
            return $this->msg;
        } else if (mysqli_num_rows($this->result) > 0) {
            $this->msg= "Username sudah ada.";
            return $this->msg;
        } else {
            $stmt = $this->db->prepare("INSERT INTO tbl_users(name, username, password, role) VALUES(?, ?, ?, ?)");
            $stmt->bind_param("ssss", $name, $username, $password, $role);
            $this->addlog("Menambahkan akun ($name)");
            ($stmt->execute()) ? header("Location: index.php?page=dashboard&q=akun&type=success&msg=Akun baru berhasil dibuat ($username)") : header("Location: index.php?page=dashboard&q=akun&type=danger&msg=Akun gagal ditambahkan.");
        }
    }
    
    public function editAkun($data, $id) {
        $name = htmlspecialchars($data["name"]);
        $username = htmlspecialchars($data["username"]);
        $password = htmlspecialchars($data["password"]);
        $role = htmlspecialchars($data["role"]);

        $this->select("SELECT * FROM tbl_users WHERE username = '$username'");
        
        if (empty($name) || empty($username) || empty($role)) {
            $this->msg= "Isi bidang yang kosong!.";
            return $this->msg;
        } else if (mysqli_num_rows($this->result) > 0) {
            $this->msg= "Username sudah ada.";
            return $this->msg;
        } else {
            if (empty($password)) {
                $stmt = $this->db->prepare("UPDATE tbl_users SET name = ?, username = ?, role = ? WHERE md5(id) = ?");
                $stmt->bind_param("ssss", $name, $username, $role, $id);
                $this->addlog("Mengedit akun akun ($name)");
                ($stmt->execute()) ? header("Location: index.php?page=dashboard&q=akun&type=success&msg=Berhasil mengedit akun ($username)") : header("Location: index.php?page=dashboard&q=akun&type=danger&msg=Akun gagal diedit.");
            } else {
                $password = password_hash($password, PASSWORD_DEFAULT);
                $stmt = $this->db->prepare("UPDATE tbl_users SET name = ?, username = ?, password = ?, role = ? WHERE md5(id) = ?");
                $stmt->bind_param("sssss", $name, $username, $password, $role, $id);
                $this->addlog("Mengedit akun ($name)");
                ($stmt->execute()) ? header("Location: index.php?page=dashboard&q=akun&type=success&msg=Berhasil mengedit akun ($username)") : header("Location: index.php?page=dashboard&q=akun&type=danger&msg=Akun gagal diedit.");
            }
        }
    }
    
    public function delete($data, $id) {
        $this->checkRole();
        $re = ($this->role === "admin") ? "dashboard&q=piket" : "piket";
        if (empty($data) || empty($id)) {
            header("location: index.php?type=danger&msg=Anda mecoba mengahpus data kosong!.");
        } else if ($data === "piket") {
            $stmt = $this->db->prepare("DELETE FROM tbl_piket WHERE md5(id) = ?");
            $stmt->bind_param("s", $id);
            $this->addlog("Menghapus data piket");
            ($stmt->execute()) ? header("location: index.php?page=$re&type=success&msg=Data piket berhasil dihapus!.") : header("location: index.php?page=$re&type=danger&msg=Data piket gagal dihapus!.");
        } else if ($data === "log" && $this->role === "admin") {
            $stmt = $this->db->prepare("DELETE FROM tbl_log WHERE md5(id) = ?");
            $stmt->bind_param("s", $id);
            ($stmt->execute()) ? header("location: index.php?page=dashboard&q=log&type=success&msg=Log berhasil dihapus!.") : header("location: index.php?page=dashboard&q=log&type=danger&msg=Log gagal dihapus!.");
        } else if ($data === "akun" && $this->role === "admin") {
            $stmt = $this->db->prepare("DELETE FROM tbl_users WHERE md5(id) = ?");
            $stmt->bind_param("s", $id);
            $this->addlog("Menghapus akun");
            ($stmt->execute()) ? header("location: index.php?page=dashboard&q=akun&type=success&msg=Akun berhasil dihapus!.") : header("location: index.php?page=dashboard&q=akun&type=danger&msg=Akun gagal dihapus!.");
        } else {
        header("location: index.php?type=danger&msg=Gagal menghapus data!.");
        }
    }
}
?>
