<?php
class Page_model
{
    protected $_db;

    public function __construct()
    {
        $this->_db = new Database;
    }
    public function total_views($page_id = null)
    {
        if ($page_id === null) {
            $query = "SELECT sum(total_views) as total_views FROM pages";

            $stmt = $this->_db->query($query);
            return $this->_db->resultSet();
        } else {
            $query = "SELECT total_views FROM pages WHERE id = :id";

            $stmt = $this->_db->query($query);
            $this->_db->bind(':id', $page_id);
            return $this->_db->resultset();
        }
    }

    public function is_unique_view($visitor_ip, $page_id)
    {
        $query = "SELECT * FROM page_views WHERE visitor_ip = :ip AND page_id = :id";

        $stmt  = $this->_db->query($query);
        $this->_db->bind(':id', $page_id);
        return $this->_db->resultset();
    }

    public function add_view($visitor_ip, $page_id)
    {
        if (is_unique_view($visitor_ip, $page_id) === true) {
            // insert unique visitor record for checking whether the visit is unique or not in future.
            $query = "INSERT INTO page_views (visitor_ip, page_id) VALUES ($visitor_ip, $page_id)";
            $stmt  = $this->_db->query($query);
            if ($stmt) {
                // At this point unique visitor record is created successfully. Now update total_views of specific page.
                $query = "UPDATE pages SET total_views = total_views + 1 WHERE id=$page_id";
                $stmt  = $this->_db->query($query);
                if (!$this->_db->query($query)) {
                    echo "Error updating record: ";
                }
            } else {
                echo "Error inserting record: ";
            }
        }
    }
}
