-- phpMyAdmin SQL Dump
-- version 4.1.14
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Jul 08, 2016 at 06:16 AM
-- Server version: 5.6.17
-- PHP Version: 5.5.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `notepad`
--

-- --------------------------------------------------------

--
-- Table structure for table `chapters`
--

CREATE TABLE IF NOT EXISTS `chapters` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `chapter_name` varchar(50) NOT NULL,
  `user` varchar(30) NOT NULL,
  `color` varchar(25) NOT NULL,
  `text_color` varchar(25) NOT NULL,
  `flag` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=21 ;

--
-- Dumping data for table `chapters`
--

INSERT INTO `chapters` (`id`, `chapter_name`, `user`, `color`, `text_color`, `flag`) VALUES
(1, 'JavaScript', 'pankaj', '#5c4949', '#ffffff', 1),
(2, 'CoffieScript', 'pankaj', '#565656', '#FFFFFF  ', 1),
(5, 'PandaScript', 'pankaj', '#30a365', '#fcfcfc', 0),
(6, 'PooChoo', 'pankaj', '', '', 0),
(7, 'R', 'pankaj', '', '', 0),
(8, 'WER', 'pankaj', '', '', 0),
(9, 'AAA', 'pankaj', '', '', 0),
(10, 'AAA', 'pankaj', '#821717', '#ffffff', 0),
(11, 'ExtJS', 'pankaj', '#b5b83c', '#707070', 1),
(12, 'Security', 'pankaj', '#99d4a6', '#242424', 1),
(13, 'JQuery', 'pankaj', '#1A9893', '#FEFEFE', 0),
(14, 'JQuery', 'pankaj', '#b830c4', '#ffffff', 0),
(15, 'MauChau', 'pankaj', '#1A9893', '#FEFEFE', 0),
(16, 'PooChoo', 'pankaj', '#1A9893', '#FEFEFE', 0),
(17, 'New Chapter', 'pankaj', '#1d3030', '#cc8c8c', 0),
(18, 'moohoo', 'pankaj', '#05d44b', '#bd6b6b', 0),
(19, 'JQuery', 'pankaj', '#1a9893', '#fefefe', 0),
(20, 'JQuery', 'pankaj', '#1a9893', '#fefefe', 0);

-- --------------------------------------------------------

--
-- Table structure for table `notes`
--

CREATE TABLE IF NOT EXISTS `notes` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `note_title` varchar(50) NOT NULL,
  `note_body` text NOT NULL,
  `user` varchar(30) NOT NULL,
  `chapter_id` int(11) NOT NULL,
  `color` varchar(15) NOT NULL,
  `text_color` varchar(15) NOT NULL,
  `flag` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=8 ;

--
-- Dumping data for table `notes`
--

INSERT INTO `notes` (`id`, `note_title`, `note_body`, `user`, `chapter_id`, `color`, `text_color`, `flag`) VALUES
(1, 'New Random Note', 'Note text', 'pankaj', 1, '#4c25c3', '#8EE3E0  ', 0),
(2, 'Plugin Demo', '<h3><strong>BBCode Plugin Demo</strong></h3>\n\n<p>This is an example of a custom data processor for CKEditor which produces ?<a href="http://ckeditor.com/addon/bbcode">BBCode</a>&nbsp;instead of HTML. Note that the editor here accepts BBCode not only on output but also on input.</p>\n\n<p>Data Processing is a powerful feature of CKEditor. By creating plugins, it is possible to make CKEditor handle different data formats transparently, like BBCode, Wiki format, Markdown, etc.</p>\n', 'pankaj', 0, '#20a656', '#ffffff', 0),
(3, 'New note in JS', '<p>New note in Jacascript</p>\n', 'pankaj', 1, '#688027', '#f5f5f5', 0),
(4, 'RRR', '<p>&lt;div id=&quot;cp2&quot; class=&quot;input-group colorpicker-component&quot;&gt; &lt;input type=&quot;text&quot; value=&quot;#00AABB&quot; class=&quot;form-control&quot; /&gt; &lt;span class=&quot;input-group-addon&quot;&gt;&lt;i&gt;&lt;/i&gt;&lt;/span&gt; &lt;/div&gt; &lt;script&gt; $(function() { $(&#39;#cp2&#39;).colorpicker(); }); &lt;/script&gt;</p>\n', 'pankaj', 1, '#ab2a2a', '#705858', 0),
(5, 'PHP Code', '<pre>\n&lt;?php\n\nclass Bill extends MY_Controller {\n\n    public function __construct() {\n        parent::__construct();\n        $this-&gt;load-&gt;model(&#39;cart_model&#39;);\n        $this-&gt;load-&gt;model(&#39;bill_model&#39;);\n    }\n\n    public function load_view_embedded($view, $data = null) {\n        $this-&gt;load-&gt;view(&quot;template/header&quot;, $this-&gt;activation_model-&gt;get_activation_data());\n        $this-&gt;load-&gt;view($view, $data);\n        $this-&gt;load-&gt;view(&quot;template/footer&quot;);\n    }\n\n    public function index() {\n        $data = array(\n            &#39;product_fetch_url&#39; =&gt; site_url(&#39;Product/index_json&#39;),\n            &#39;list1_append_url&#39; =&gt; site_url(&#39;Bill/add_to_raw_list&#39;),\n            &#39;reload_cart1_url&#39; =&gt; site_url(&#39;Bill/view_list_1&#39;),\n            &#39;cart_reset_url&#39; =&gt; site_url(&#39;Bill/clear_list_1&#39;)\n        );\n        $this-&gt;load_view_embedded(&#39;bill/dashboard&#39;, $data);\n    }\n\n    public function view_list_1() {\n//        $first_list = $this-&gt;cart_model-&gt;get_first_list();\n//        foreach ($first_list as $f) {\n//            echo &quot;&lt;li class=\\&quot;list-group-item\\&quot;&gt;&quot;.$f.&quot;&lt;/li&gt;&quot;;\n//        }\n        $data[&#39;products&#39;] = $this-&gt;cart_model-&gt;cart1_products();\n        $this-&gt;load-&gt;view(&#39;bill/pallete&#39;, $data);\n    }\n\n    public function add_to_raw_list($product_id) {\n        if ($this-&gt;cart_model-&gt;is_already_inside($product_id) == false) {\n            $this-&gt;cart_model-&gt;add_product_to_cart1($product_id);\n        }\n    }\n\n    public function view_list_2() {\n\n        //$this-&gt;cart_model-&gt;add_product_to_cart2(3,3,1,1);\n\n\n        $second_list = $this-&gt;cart_model-&gt;get_second_list();\n        foreach ($second_list as $l) {\n            echo &quot;&lt;br/&gt;&quot; . $l[&#39;product_id&#39;] . &quot;&gt;&gt;&quot; . $l[&#39;rate&#39;] . &quot;&gt;&gt;&quot; . $l[&#39;quantity&#39;] . &quot;&gt;&gt;&quot; . $l[&#39;total&#39;];\n        }\n    }\n\n    public function add_to_final_list($product_id, $rate, $quantity, $total) {\n        if ($this-&gt;cart_model-&gt;is_already_inside_cart2($product_id) == false) {\n            $this-&gt;cart_model-&gt;add_product_to_cart2($product_id, $rate, $quantity, $total);\n        }\n    }\n\n    public function minus_list_1($product_id) {\n        $this-&gt;cart_model-&gt;remove_from_cart1($product_id);\n    }\n\n    public function minus_list_2($product_id) {\n        $this-&gt;cart_model-&gt;remove_from_cart2($product_id);\n    }\n\n    public function clear_list_1() {\n        $this-&gt;cart_model-&gt;clear_cart1();\n    }\n\n    public function clear_list_2() {\n        $this-&gt;cart_model-&gt;clear_cart2();\n    }\n\n    public function add_new() {\n        if ($this-&gt;input-&gt;post(&#39;bill_number&#39;)) {\n            $bill = array(\n                &#39;bill_number&#39; =&gt; $this-&gt;input-&gt;post(&#39;bill_number&#39;),\n                &#39;seller_id&#39; =&gt; $this-&gt;input-&gt;post(&#39;seller_id&#39;),\n                &#39;total&#39; =&gt; $this-&gt;input-&gt;post(&#39;total&#39;),\n                &#39;cheque&#39; =&gt; $this-&gt;input-&gt;post(&#39;cheque&#39;),\n                &#39;cash&#39; =&gt; $this-&gt;input-&gt;post(&#39;cash&#39;),\n                &#39;pending&#39; =&gt; $this-&gt;input-&gt;post(&#39;pending&#39;),\n                &#39;date&#39; =&gt; $this-&gt;input-&gt;post(&#39;date&#39;),\n            );\n            $this-&gt;load-&gt;model(&#39;bill_model&#39;);\n            $this-&gt;bill_model-&gt;add_new($bill);\n            $this-&gt;set_success_flash(&quot;Payment bill saved successfully.&quot;);\n            redirect(&#39;Bill/add_new&#39;);\n        } else {\n            $data = array(\n                &#39;back_url&#39; =&gt; site_url(&#39;Bill/dashboard&#39;),\n                &#39;form_submit_url&#39; =&gt; site_url(&#39;Bill/add_new&#39;)\n            );\n\n            $this-&gt;load-&gt;model(&#39;key_value_model&#39;);\n            $data[&#39;set_date&#39;] = $this-&gt;key_value_model-&gt;get_value(&#39;date&#39;);\n\n\n            $data[&#39;seller_id&#39;] = $this-&gt;key_value_model-&gt;get_value(&#39;seller_id&#39;);\n\n            if ($this-&gt;input-&gt;get(&#39;seller_id&#39;)) {\n                $data[&#39;seller_id&#39;] = $this-&gt;input-&gt;get(&#39;seller_id&#39;);\n            }\n\n            $this-&gt;load-&gt;model(&quot;seller_model&quot;);\n            $data[&quot;sellers&quot;] = $this-&gt;seller_model-&gt;get_all_entries(null);\n\n            $this-&gt;load_view_embedded(&#39;bill/add_bill&#39;, $data);\n        }\n    }\n\n    public function update($id) {\n        if ($this-&gt;input-&gt;post(&#39;bill_id&#39;)) {\n            $bill_id = $this-&gt;input-&gt;post(&#39;bill_id&#39;);\n            $bill = array(\n                &#39;bill_number&#39; =&gt; $this-&gt;input-&gt;post(&#39;bill_number&#39;),\n                &#39;seller_id&#39; =&gt; $this-&gt;input-&gt;post(&#39;seller_id&#39;),\n                &#39;total&#39; =&gt; $this-&gt;input-&gt;post(&#39;total&#39;),\n                &#39;cheque&#39; =&gt; $this-&gt;input-&gt;post(&#39;cheque&#39;),\n                &#39;cash&#39; =&gt; $this-&gt;input-&gt;post(&#39;cash&#39;),\n                &#39;pending&#39; =&gt; $this-&gt;input-&gt;post(&#39;pending&#39;),\n                &#39;date&#39; =&gt; $this-&gt;input-&gt;post(&#39;date&#39;),\n            );\n            $this-&gt;load-&gt;model(&#39;bill_model&#39;);\n            $this-&gt;bill_model-&gt;update($bill_id, $bill);\n            //$this-&gt;set_success_flash(&quot;Payment bill saved successfully.&quot;);\n            redirect(&#39;Bill/dashboard&#39;);\n        } else {\n            $bill = $this-&gt;bill_model-&gt;get_all($id);\n            $bill = $bill[0];\n\n            $data = array(\n                &#39;edit&#39; =&gt; true,\n                &#39;bill&#39; =&gt; $bill,\n                &#39;back_url&#39; =&gt; site_url(&#39;Bill/dashboard&#39;),\n                &#39;form_submit_url&#39; =&gt; site_url(&#39;Bill/update/&#39; . $id)\n            );\n\n//            $this-&gt;load-&gt;model(&#39;key_value_model&#39;);\n//            $data[&#39;set_date&#39;] = $this-&gt;key_value_model-&gt;get_value(&#39;date&#39;);\n//            $data[&#39;seller_id&#39;] = $this-&gt;key_value_model-&gt;get_value(&#39;seller_id&#39;);\n\n            $this-&gt;load-&gt;model(&quot;seller_model&quot;);\n            $data[&quot;sellers&quot;] = $this-&gt;seller_model-&gt;get_all_entries(null);\n\n            $this-&gt;load_view_embedded(&#39;bill/add_bill&#39;, $data);\n        }\n    }\n\n    public function dashboard() {\n        $bills = $this-&gt;bill_model-&gt;get_all();\n        $this-&gt;load-&gt;model(&#39;seller_model&#39;);\n        $sellers = $this-&gt;seller_model-&gt;get_all_entries();\n        $s_array = null;\n        foreach ($sellers as $s) {\n            $s_array[$s-&gt;id] = $s-&gt;seller_name;\n        }\n        foreach ($bills as $b) {\n            $b-&gt;seller_name = $s_array[$b-&gt;seller_id];\n        }\n        $data = array(\n            &#39;bills&#39; =&gt; $bills,\n            &#39;addButtonLabel&#39; =&gt; &#39;Add new payment bill&#39;,\n            &#39;add_link&#39; =&gt; site_url(&#39;Bill/add_new&#39;),\n            &#39;label&#39; =&gt; &#39;Payment bills&#39;,\n            &#39;total_bills&#39; =&gt; $this-&gt;bill_model-&gt;count_bills(array(&#39;tag&#39; =&gt; 1)),\n            &#39;total_money&#39; =&gt; $this-&gt;bill_model-&gt;sum_bills(&#39;total&#39;, array(&#39;tag&#39; =&gt; 1))-&gt;total,\n            &#39;total_cash&#39; =&gt; $this-&gt;bill_model-&gt;sum_bills(&#39;cash&#39;, array(&#39;tag&#39; =&gt; 1))-&gt;cash,\n            &#39;total_cheque&#39; =&gt; $this-&gt;bill_model-&gt;sum_bills(&#39;cheque&#39;, array(&#39;tag&#39; =&gt; 1))-&gt;cheque,\n            &#39;total_pending&#39; =&gt; $this-&gt;bill_model-&gt;sum_bills(&#39;pending&#39;, array(&#39;tag&#39; =&gt; 1))-&gt;pending\n        );\n        $this-&gt;load_view_embedded(&quot;bill/dashboard&quot;, $data);\n    }\n\n    public function delete($id) {\n        if ($this-&gt;input-&gt;post(&#39;id&#39;)) {\n\n            $this-&gt;bill_model-&gt;delete($this-&gt;input-&gt;post(&#39;id&#39;));\n            redirect(&#39;Bill/dashboard&#39;);\n        } else {\n\n            $data[&#39;delete_form_url&#39;] = site_url(&#39;Bill/delete/&#39; . $id);\n            $data[&#39;confirmation_line&#39;] = &quot;Are you sure want to delete this bill entry?&quot;;\n            $data[&#39;back_url&#39;] = site_url(&#39;Bill/dashboard&#39;);\n            $data[&#39;item_id&#39;] = $id;\n\n            $this-&gt;load-&gt;view(&quot;template/header&quot;, $this-&gt;activation_model-&gt;get_activation_data());\n            $this-&gt;load-&gt;view(&quot;common/delete&quot;, $data);\n            $this-&gt;load-&gt;view(&quot;template/footer&quot;);\n        }\n    }\n\n    public function single($id) {\n        $data[&#39;upload_new_link&#39;] = site_url(&#39;FileUpload/add_new?attachment_type=5&amp;attachment_id=&#39; . $id);\n        $data[&#39;uploads_json_fetch_link&#39;] = site_url(&#39;FileUpload/get_uploads/&#39; . $id . &#39;/5&#39;);\n        $data[&#39;upload_base&#39;] = base_url(&#39;assets/uploads/&#39;);\n\n        $this-&gt;load-&gt;view(&quot;template/header&quot;, $this-&gt;activation_model-&gt;get_activation_data());\n        $this-&gt;load-&gt;view(&quot;bill/single&quot;, $data);\n        $this-&gt;load-&gt;view(&quot;template/footer&quot;);\n    }\n\n}</pre>\n', 'pankaj', 0, '#29a66a', '#d4d4d4', 1),
(6, 'Python Scrap', '<pre>\n&gt;&gt;&gt; c = 3-5j poochoo\n&gt;&gt;&gt; (&#39;The complex number {0} is formed from the real part {0.real} &#39;\n...  &#39;and the imaginary part {0.imag}.&#39;).format(c)\n&#39;The complex number (3-5j) is formed from the real part 3.0 and the imaginary part -5.0.&#39;\n&gt;&gt;&gt; class Point(object):\n...     def __init__(self, x, y):\n...         self.x, self.y = x, y\n...     def __str__(self):\n...         return &#39;Point({self.x}, {self.y})&#39;.format(self=self)\n...\n&gt;&gt;&gt; str(Point(4, 2))\n&#39;Point(4, 2)&#39;</pre>\n', 'pankaj', 1, '#851a1a', '#3a6149', 1),
(7, 'Python Scrap', '', 'pankaj', 2, '#ffffff', '#000000', 1);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
