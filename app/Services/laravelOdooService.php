<?php
namespace App\Services;

use Ripcord\Ripcord;

class laravelOdooService
{
    protected $url;
    protected $db;
    protected $username;
    protected $password;
    protected $uid;
    protected $common;
    protected $models;

    public function __construct()
    {
        // Fetch credentials from .env
        $this->url = env('ODOO_URL');
        $this->db = env('ODOO_DB');
        $this->username = env('ODOO_USERNAME');
        $this->password = env('ODOO_PASSWORD');

        // Connect to Odoo Authentication Service
        $this->common = Ripcord::client("{$this->url}/xmlrpc/2/common");

        // Authenticate and get user ID
        $this->uid = $this->common->authenticate($this->db, $this->username, $this->password, []);

        if (!$this->uid) {
            throw new \Exception('Failed to authenticate with Odoo.');
        }

        // Connect to Odoo's Models Service
        $this->models = Ripcord::client("{$this->url}/xmlrpc/2/object");
    }

    /**
     * Check if the user has access rights to a model.
     */
    public function checkAccessRights($model, $permission = 'read')
    {
        return $this->models->execute_kw(
            $this->db, 
            $this->uid, 
            $this->password, 
            $model, 
            'check_access_rights', 
            [[$permission]], 
            ['raise_exception' => false]
        );
    }

    /**
     * Fetch all products from Odoo
     */
    public function getProducts()
    {
        return $this->models->execute_kw(
            $this->db, 
            $this->uid, 
            $this->password, 
            'product.product', 
            'search_read', 
            [[]], 
            ['fields' => ['id', 'name', 'list_price', 'qty_available']]
        );
    }

    /**
     * Update product price in Odoo
     */
    public function updateProductPrice($productId, $newPrice)
    {
        return $this->models->execute_kw(
            $this->db, 
            $this->uid, 
            $this->password, 
            'product.product', 
            'write', 
            [[$productId], ['list_price' => $newPrice]]
        );
    }
}
