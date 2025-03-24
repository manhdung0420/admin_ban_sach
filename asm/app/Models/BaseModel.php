<?php

namespace App\Models;

use PDO;
use PDOException;

class BaseModel
{
    protected $conn = null;
    protected $tableName = null;
    protected $primaryKey = "id";
    protected $sqlBuilder = '';

    public function __construct()
    {
        try {
            $this->conn = new PDO("mysql:host=localhost; dbname=asmphp2;
            charset=utf8; port=3306", "root", "");
        } catch (PDOException $e) {
            echo "Lỗi kết nối cơ sở dữ liệu: " . $e->getMessage();
        }
    }

    public static function all()
    {
        $model = new static;
        $model->sqlBuilder = "SELECT * FROM $model->tableName";
        $stmt = $model->conn->prepare($model->sqlBuilder);
        $stmt->execute();
        // dd($model->sqlBuilder);
        return $stmt->fetchAll(PDO::FETCH_CLASS);
    }

    /**
     * method create: dùng để thêm dữ liệu 
     * @$data: dữ liệu bao gồm có key và value, trong đó key là tên cột trong bảng dữ liệu và value tương ứng
     */

    public static function create($data)
    {
        $model = new static;
        $sql = "INSERT INTO $model->tableName(";
        $values = "VALUES(";

        foreach ($data as $column => $val) {
            $sql .= "`$column`, ";
            $values .= ":$column, ";
        }

        $sql = rtrim($sql, ", ") . ") " . rtrim($values, ", ") . ")";
        // dd($sql);
        $stmt = $model->conn->prepare($sql);
        $stmt->execute($data);
        return $model->conn->lastInsertId();
    }

    /**
     * phương thức update: để cập nhật dữ liệu theo id
     * @data: dữ liệu bao gồm key và value, trong đó key được gọi là tên cột trong bảng dữ liệu và value tương ứng
     */

    public static function update($data, $id)
    {
        $model = new static;
        $sql = "UPDATE $model->tableName SET ";
        foreach ($data as $column => $val) {
            $sql .= "`$column`=:$column, ";
        }

        $sql = rtrim($sql, ", ") . " WHERE $model->primaryKey=:$model->primaryKey";

        //Thêm primary vào cho data
        $data["$model->primaryKey"] = $id;
        $stmt = $model->conn->prepare($sql);
        $stmt->execute($data);
    }


    /**
     * @method delete:Phương thức xoá
     * @param $id: Giá trị thoe khoá chính
     */

    public static function delete($id)
    {
        $model = new static;
        $sql = "DELETE FROM $model->tableName WHERE
        $model->primaryKey=:$model->primaryKey";
        // dd($sql);
        $stmt = $model->conn->prepare($sql);
        $stmt->execute(["$model->primaryKey" => $id]);
    }

    /** 
     * @method find: tìm kiếm dữ liệu theo id, trả về 1 bản ghi
     * @param $id: Giá trị cần tìm
     */

    public static function find($id)
    {
        $model = new static;
        $sql = "SELECT * FROM $model->tableName WHERE
        $model->primaryKey=:$model->primaryKey";

        $stmt = $model->conn->prepare($sql);
        $stmt->execute(["$model->primaryKey" => $id]);

        $result = $stmt->fetchAll(PDO::FETCH_CLASS);
        // dd($result);
        return $result[0] ?? [];
    }

    /** 
     * @method where: phương thức tìm kiếm dữ liệu theo điều kiện
     * @param $column: tên cột cần tìm
     * @param $operator: biểu thức
     * @param $value: giá trị cần tìm
     */

    public function where($column, $operator, $value)
    {
        // $model = new static;
        // dd($this->sqlBuilder);
        if ($this->sqlBuilder != '') {
            $this->sqlBuilder .= " WHERE $column $operator '$value'";
        } else
            $this->sqlBuilder = "SELECT * FROM $this->tableName WHERE $column $operator '$value'";
        // dd($this->sqlBuilder);
        return $this;
    }

    /** 
     * @method get: lấy dữ liệu
     */

    public function get()
    {
        $stmt = $this->conn->prepare($this->sqlBuilder);
        // dd($this->sqlBuilder);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_CLASS);
    }

    /** 
     * @method first: Lấy ra từ phẩn tử đầu tiên
     */

    public function first()
    {
        $stmt = $this->conn->prepare($this->sqlBuilder);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_CLASS)[0] ?? [];
    }

    /** 
     * @method orWhere: Thêm điều kiện hoặc 
     * @param $column: tên cột cần tìm
     * @param $operator: biểu thức
     * @param $value: giá trị cần tìm
     */

    public function orWhere($column, $operator, $value)
    {
        $this->sqlBuilder .= " OR `$column` $operator '$value'";
        return $this;
    }
    public function andWhere($column, $operator, $value)
    {
        $this->sqlBuilder .= " AND `$column` $operator '$value'";

        return $this;
    }

    /** 
     * @method select: Phương thức chọn cột cần lấy
     * @param $columns: mảng các tên cột cần lấy
     */

    public static function select($columns = ['*'])
    {
        $model = new static;

        $model->sqlBuilder = "SELECT ";
        foreach ($columns as $col) {
            $model->sqlBuilder .= " $col, ";
        }
        // Loại bỏ dấu ", "
        $model->sqlBuilder = rtrim($model->sqlBuilder, ", ") . " FROM $model->tableName";

        return $model;
    }

    /** 
     * @method join: nối bảng
     * @param $table: tên bảng cần nối
     * @param $parentKey: Khoá chính bảng cha
     * @param $childKey: Khoá ngoại
     */
    public function join($table, $reference, $key)
    {
        $this->sqlBuilder .= " JOIN $table ON $this->tableName.$reference = $table.$key";
        return $this;
    }
    public static function whereUser($column, $operator, $value)
    {
        $model = new static;
        if ($model->sqlBuilder == null) {
            $model->sqlBuilder = "SELECT * FROM $model->tableName WHERE $column $operator '$value'";
        } else {
            $model->sqlBuilder .= " WHERE $column $operator '$value'";
        }

        // dd($model->sqlBuilder);
        return $model;
    }
    /**
     * @method orderByDesc: Sắp xếp dữ liệu theo cột giảm dần
     * @param $column: Tên cột cần sắp xếp
     */
    public function orderByDesc($column)
    {
        $this->sqlBuilder .= " ORDER BY `$column` DESC";
        return $this;
    }

    public static function whereTable($column, $operator, $value)
{
    $model = new static;
    $model->sqlBuilder = "SELECT * FROM $model->tableName WHERE $column $operator '$value'";
    return $model;
}

}
