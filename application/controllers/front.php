<?php
class Front extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        date_default_timezone_set("PRC");
        $this->load->helper('url');
        $this->load->model('front_model');
    }

    /******************************************/
    /* The following funcitons control views. */
    /******************************************/
    
    public function home()
    {
        $this->load->view("front/home");
    }

    public function artlist()
    {
        $data['article'] = $this->front_model->get_article(10,0);
        $this->load->view("front/artlist", $data);
    }

    public function artdetail($id = 0)
    {
        $data['article_item'] = $this->front_model->get_article_id($id);
        $this->load->view("front/artdetail", $data);
    }

    public function newart()
    {
        $this->load->view("front/newart");
    }

    public function login()
    {
        $this->load->view("front/login");
    }

    public function loginsucc($msg = "default")
    {
        echo $msg;
        echo "<br />";
        print_r($this->input->get(NULL, TRUE));
    }

    /**********************************************/
    /* The following two funcitons are for skygr. */
    /**********************************************/

    /* 函数: get_arts()
     * 参数: $offset, 表示偏移量
     * 作用：从$offset开始，读取十篇文章的信息，
     *       每条信息包括_post表里的所有字段，以及新增的字段vote_count，表示该文章的得票数
     * 返回值：json编码的数据
     */
    public function get_arts() {
        $offset = $this->input->get_post("offset");
        echo json_encode($this->front_model->get_arts($offset));
    }

    /* 函数: set_vote()
     * 参数: $openid, 当前登录用户的openid
     *       $author, 要投票给该作者，该作者的openid
     * 作用：投票
     * 返回值：投票失败(已经给那个人投过票了)返回false，
     *         投票成功返回true
     */
    public function set_vote() {
        $openid = $this->input->get_post("openid");
        $author = $this->input->get_post("author");
        echo $this->front_model->set_vote($openid, $author);
    }

    /***********************************/
    /* The follwing code is completed. */
    /***********************************/

    public function get_regist() {
        $openid = $this->input->get_post("openid");
        echo $this->front_model->get_regist($openid);
    }

    public function get_post()
    {
        $openid = $this->input->get_post("openid");
        echo json_encode($this->front_model->get_post($openid));
    }

    public function set_regist()
    {
        $data = array(
            'user_nickname'    => $this->input->post('user_nickname'),
            'user_gender'      => $this->input->post('user_gender'),
            'user_figureurl'   => $this->input->post('user_figureurl'),
            'user_openid'      => $this->input->post('user_openid'),
            'user_accesstoken' => $this->input->post('user_accesstoken'),
            'user_regtime'     => date("Y-m-d H:i:s", time()),
            'user_lastlogin'   => date("Y-m-d H:i:s", time())
        );
        echo $this->front_model->set_regist($data);
    }

    public function set_moreinfo()
    {
        $data = array(
            'user_openid'    => $this->input->post('user_openid'),
            'user_penname'   => $this->input->post('user_penname'),
            'user_realname'  => $this->input->post('user_realname'),
            'user_phone'     => $this->input->post('user_phone'),
            'user_email'     => $this->input->post('user_email')
        );
        echo $this->front_model->set_moreinfo($data);
    }

    public function set_post()
    {
        $data = array(
            'post_title'    => $this->input->post('post_title'),
            'post_content'  => $this->input->post('post_content'),
            'post_author'   => $this->input->post('post_author'),
        );
        echo $this->front_model->set_post($data);
    }

}