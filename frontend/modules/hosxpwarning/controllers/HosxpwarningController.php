<?php
namespace frontend\modules\hosxpwarning\controllers;

use yii\web\Controller;
use yii\db\Query;
use Yii;
use yii\data\ArrayDataProvider;

//AccessControl
use mdm\admin\components\AccessControl;
use yii\filters\VerbFilter;

class HosxpwarningController extends Controller {
    public function behaviors(){
        return [
            'access' => [
                'class' => AccessControl::className(),
                'allowActions' => ['index']
            ],

            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'logout' => ['post'],
                ],
            ],
        ];
    }

    public function actionIndex() {
        $date_start = "2015-10-01";
        $sql_chart1 = "SELECT COUNT(DISTINCT hn) AS cc_hn FROM vn_stat WHERE vstdate  BETWEEN '$date_start' AND DATE(NOW())AND (pdx='' OR pdx IS NULL)";
        $sql_chart2 = "SELECT COUNT(DISTINCT hn) AS cc_hn FROM an_stat  WHERE  dchdate BETWEEN '$date_start' AND DATE(NOW())AND (pdx='' OR pdx IS NULL)";
        $sql_chart3 = "SELECT COUNT(DISTINCT hn) AS cc_hn FROM patient WHERE  patient.hn  IN (SELECT hn FROM vn_stat WHERE vstdate  BETWEEN '$date_start' AND DATE(NOW())) AND (patient.type_area='' OR patient.type_area<>'4' OR patient.type_area IS NULL)";
        $sql_chart4 = "SELECT COUNT(DISTINCT p.hn) AS cc_hn
        FROM er_nursing_detail en
        INNER JOIN ovst o ON o.vn=en.vn
        INNER JOIN ovst_seq os ON os.vn=en.vn
        INNER JOIN er_regist e ON e.vn=o.vn
        INNER JOIN er_pt_type erpt ON erpt.er_pt_type=e.er_pt_type AND erpt.accident_code='Y'
        INNER JOIN patient p ON p.hn=o.hn
        INNER JOIN pq_screen  pq ON pq.vn=en.vn
        INNER JOIN opduser ou ON ou.loginname=pq.staff
        WHERE e.vstdate BETWEEN '$date_start' AND DATE(NOW())
        AND (en.accident_place_type_id='' OR en.accident_place_type_id IS NULL
        or en.visit_type='' OR en.visit_type IS NULL
        or en.accident_alcohol_type_id='' OR en.accident_alcohol_type_id IS NULL
        or en.accident_drug_type_id='' OR en.accident_drug_type_id IS NULL
        or en.accident_airway_type_id='' OR en.accident_airway_type_id IS NULL
        or en.accident_bleed_type_id='' OR en.accident_bleed_type_id IS NULL
        or en.accident_splint_type_id='' OR en.accident_splint_type_id IS NULL
        or en.accident_fluid_type_id='' OR en.accident_fluid_type_id IS NULL
        or en.er_emergency_type='' OR en.er_emergency_type IS NULL )
        ORDER BY e.enter_er_time";
        $sql_chart5 = "SELECT COUNT(DISTINCT o.hn) AS cc_hn FROM ovstdiag o WHERE  o.vstdate  BETWEEN '$date_start' AND DATE(NOW())
                       AND (o.diagtype='' OR o.diagtype IS NULL OR o.diagtype NOT IN('1','2','3','4','5','6','7'))";
        $sql_chart6 = "SELECT COUNT(DISTINCT person_id)AS cc_pid FROM person WHERE house_regist_type_id IN ('1','3')
                       AND nationality<>'99' AND death='N'";
        $sql_chart7 = "SELECT  COUNT(DISTINCT person_id)AS cc_pid FROM person WHERE house_regist_type_id IN ('1','3') AND person_discharge_id<>'9'AND death='N'";
        $sql_chart8 = "SELECT COUNT(DISTINCT person_id) AS cc_pid FROM person WHERE village_id='1' AND house_regist_type_id IN ('1','3')";
        $sql_chart9 = "SELECT COUNT(house_id) AS cc_house FROM house WHERE (location_area_id IS NULL  OR location_area_id= ''
                       OR house_type_id IS NULL OR house_type_id= '' OR house_subtype_id  IS NULL OR house_subtype_id ='')";
        $sql_chart10 = "SELECT COUNT(DISTINCT person_id)AS cc_pid FROM person WHERE (house_regist_type_id='' OR house_regist_type_id IS NULL)";
        $sql_chart11 = "SELECT COUNT(DISTINCT xr.hn) AS cc_hn
                        FROM xray_head  xr
                        left outer join patient p on p.hn=xr.hn
                        WHERE xr.hn not in (SELECT hn FROM xrayxn WHERE regdate BETWEEN '$date_start' AND DATE(NOW()))
                        and  xr.order_date BETWEEN '$date_start' AND DATE(NOW()) and (xr.pt_xn='' OR xr.pt_xn is null )";
        $sql_chart12 = "select count(DISTINCT an) as an_cc from ipt where (dchdate=' ' or dchdate is null)";

        $chart1 = Yii::$app->db2->createCommand($sql_chart1)->queryAll();
        $chart2 = Yii::$app->db2->createCommand($sql_chart2)->queryAll();
        $chart3 = Yii::$app->db2->createCommand($sql_chart3)->queryAll();
        $chart4 = Yii::$app->db2->createCommand($sql_chart4)->queryAll();
        $chart5 = Yii::$app->db2->createCommand($sql_chart5)->queryAll();
        $chart6 = Yii::$app->db2->createCommand($sql_chart6)->queryAll();
        $chart7 = Yii::$app->db2->createCommand($sql_chart7)->queryAll();
        $chart8 = Yii::$app->db2->createCommand($sql_chart8)->queryAll();
        $chart9 = Yii::$app->db2->createCommand($sql_chart9)->queryAll();
        $chart10 = Yii::$app->db2->createCommand($sql_chart10)->queryAll();
        $chart11 = Yii::$app->db2->createCommand($sql_chart11)->queryAll();
        $chart12 = Yii::$app->db2->createCommand($sql_chart12)->queryAll();

        return $this->render('index', [
            'date_start' => $date_start,
            'chart1' => $chart1,
            'chart2' => $chart2,
            'chart3' => $chart3,
            'chart4' => $chart4,
            'chart5' => $chart5,
            'chart6' => $chart6,
            'chart7' => $chart7,
            'chart8' => $chart8,
            'chart9' => $chart9,
            'chart10' => $chart10,
            'chart11' => $chart11,
            'chart12' => $chart12]);
    }
    public function actionDetail1() {
        $date_start = "2015-10-01";
        $sql_detail1 = "SELECT v.hn,CONCAT(p.pname,p.fname,p.lname) AS full_name,o.vstdate,o.vsttime,o.cc,v.pdx
                        FROM vn_stat v 
                        LEFT OUTER JOIN opdscreen o ON o.vn=v.vn
                        LEFT OUTER JOIN patient p ON p.hn=v.hn
                        WHERE v.vstdate  BETWEEN '$date_start' AND DATE(NOW())AND (v.pdx='' OR v.pdx IS NULL)
                        GROUP BY v.hn
                        ORDER BY v.vstdate ASC";
        $data1 = Yii::$app->db2->createCommand($sql_detail1)->queryAll();

        $dataProvider = new ArrayDataProvider([
            'allModels'=>$data1,
        ]);

        return $this->render('detail1', ['dataProvider' => $dataProvider]);
    }
    
    public function actionDetail2() {
        $date_start = "2015-10-01";
        $sql_detail2 = "SELECT a.hn,CONCAT(p.pname,p.fname,p.lname) AS full_name,a.an,a.regdate,w.name AS ward_name,a.pdx
                        FROM an_stat a 
                        LEFT OUTER JOIN patient p ON p.hn=a.hn
                        LEFT OUTER JOIN ward w ON w.ward=a.ward
                        WHERE  a.dchdate BETWEEN '$date_start' AND DATE(NOW())AND (a.pdx='' OR a.pdx IS NULL)
                        GROUP BY a.an
                        ORDER BY a.regdate";
        $data2 = Yii::$app->db2->createCommand($sql_detail2)->queryAll();

        $dataProvider = new ArrayDataProvider([
            'allModels'=>$data2,
        ]);

        return $this->render('detail2', ['dataProvider' => $dataProvider]);
    }
    public function actionDetail3() {
        $date_start = "2015-10-01";
        $sql_detail3 = "SELECT p.hn,p.cid,CONCAT(p.pname,p.fname,' ',p.lname) AS full_name,p.informaddr,p.type_area,p.last_update
                        FROM patient p 
                        WHERE  p.hn  IN (SELECT hn FROM vn_stat 
                        WHERE vstdate  BETWEEN '$date_start' AND DATE(NOW())) 
                        AND (p.type_area='' OR p.type_area<>'4' OR p.type_area IS NULL)";
        $data3 = Yii::$app->db2->createCommand($sql_detail3)->queryAll();

        $dataProvider = new ArrayDataProvider([
            'allModels'=>$data3,
        ]);

        return $this->render('detail3', ['dataProvider' => $dataProvider]);
    }
    public function actionDetail4() {
        $date_start = "2015-10-01";
        $sql_detail4 = "SELECT p.hn,CONCAT(p.pname,p.fname,' ',p.lname) AS full_name,e.vstdate,
        en.visit_type,en.accident_alcohol_type_id,en.accident_drug_type_id,en.er_emergency_type,
        en.accident_airway_type_id,en.accident_bleed_type_id,en.accident_splint_type_id,en.accident_fluid_type_id
        FROM er_nursing_detail en
        INNER JOIN ovst o ON o.vn=en.vn
        INNER JOIN ovst_seq os ON os.vn=en.vn
        INNER JOIN er_regist e ON e.vn=o.vn
        INNER JOIN er_pt_type erpt ON erpt.er_pt_type=e.er_pt_type AND erpt.accident_code='Y'
        INNER JOIN patient p ON p.hn=o.hn
        INNER JOIN pq_screen  pq ON pq.vn=en.vn
        INNER JOIN opduser ou ON ou.loginname=pq.staff
        WHERE e.vstdate BETWEEN '$date_start' AND DATE(NOW())
        AND (en.accident_place_type_id='' OR en.accident_place_type_id IS NULL
        OR en.visit_type='' OR en.visit_type IS NULL
        OR en.accident_alcohol_type_id='' OR en.accident_alcohol_type_id IS NULL
        OR en.accident_drug_type_id='' OR en.accident_drug_type_id IS NULL
        OR en.accident_airway_type_id='' OR en.accident_airway_type_id IS NULL
        OR en.accident_bleed_type_id='' OR en.accident_bleed_type_id IS NULL
        OR en.accident_splint_type_id='' OR en.accident_splint_type_id IS NULL
        OR en.accident_fluid_type_id='' OR en.accident_fluid_type_id IS NULL
        OR en.er_emergency_type='' OR en.er_emergency_type IS NULL )
        ORDER BY e.enter_er_time";
        $data4 = Yii::$app->db2->createCommand($sql_detail4)->queryAll();

        $dataProvider = new ArrayDataProvider([
            'allModels'=>$data4,
        ]);

        return $this->render('detail4', ['dataProvider' => $dataProvider]);
    }
    public function actionDetail5() {
        $date_start = "2015-10-01";
        $sql_detail5 = "SELECT p.hn,p.cid,CONCAT(p.pname,p.fname,' ',p.lname) AS full_name,o.vstdate,o.icd10,o.diagtype,d.name AS doctor_name
        FROM ovstdiag o 
        INNER JOIN patient p ON p.hn=o.hn
        LEFT OUTER JOIN doctor d ON d.code=o.doctor
        WHERE  o.vstdate  BETWEEN '$date_start' AND DATE(NOW())
        AND (o.diagtype='' OR o.diagtype IS NULL OR o.diagtype NOT IN('1','2','3','4','5','6','7'))";
        $data5 = Yii::$app->db2->createCommand($sql_detail5)->queryAll();

        $dataProvider = new ArrayDataProvider([
            'allModels'=>$data5,
        ]);

        return $this->render('detail5', ['dataProvider' => $dataProvider]);
    }
    public function actionDetail6() {
        $sql_detail6 = "SELECT p.person_id,p.cid,CONCAT(p.pname,p.fname,p.lname) AS full_name,p.age_y,p.nationality,p.house_regist_type_id,v.village_name,p.last_update 
        FROM person p
        LEFT OUTER JOIN village v ON v.village_id=p.village_id
        WHERE p.house_regist_type_id IN ('1','3')
        AND p.nationality<>'99' AND p.death='N'";
        $data6 = Yii::$app->db2->createCommand($sql_detail6)->queryAll();

        $dataProvider = new ArrayDataProvider([
            'allModels'=>$data6,
        ]);

        return $this->render('detail6', ['dataProvider' => $dataProvider]);
    }
    public function actionDetail7() {
        $sql_detail7 = "SELECT p.person_id,p.cid,CONCAT(p.pname,p.fname,p.lname) AS full_name,p.age_y,v.village_name,
        p.house_regist_type_id,CONCAT(d.person_discharge_id,' : ',d.person_discharge_name)AS discharge,p.last_update
        FROM person p
        LEFT OUTER JOIN village v ON v.village_id=p.village_id
        LEFT OUTER JOIN person_discharge d ON d.person_discharge_id=p.person_discharge_id
        WHERE p.house_regist_type_id IN ('1','3') AND p.person_discharge_id<>'9'AND p.death='N'";
        $data7 = Yii::$app->db2->createCommand($sql_detail7)->queryAll();

        $dataProvider = new ArrayDataProvider([
            'allModels'=>$data7,
        ]);

        return $this->render('detail7', ['dataProvider' => $dataProvider]);
    }
    public function actionDetail8() {
        $sql_detail8 = "SELECT p.person_id,p.cid,CONCAT(p.pname,p.fname,p.lname) AS full_name,p.age_y,v.village_name,
        p.house_regist_type_id,CONCAT(d.person_discharge_id,' : ',d.person_discharge_name)AS discharge,p.last_update
        FROM person p
        LEFT OUTER JOIN village v ON v.village_id=p.village_id
        LEFT OUTER JOIN person_discharge d ON d.person_discharge_id=p.person_discharge_id
        WHERE p.village_id='1' AND p.house_regist_type_id IN ('1','3')";
        $data8 = Yii::$app->db2->createCommand($sql_detail8)->queryAll();

        $dataProvider = new ArrayDataProvider([
            'allModels'=>$data8,
        ]);

        return $this->render('detail8', ['dataProvider' => $dataProvider]);
    }
    public function actionDetail9() {
        $sql_detail9 = "SELECT h.house_id,v.village_name,h.address,h.location_area_id,CONCAT(t.house_type_id,' : ',t.house_type_name) AS house_type,CONCAT(s.house_subtype_id,' : ',s.house_subtype_name) AS house_subtype,h.last_update
        FROM house h
        LEFT OUTER JOIN village v ON v.village_id=h.village_id
        LEFT OUTER JOIN house_type t ON t.house_type_id=h.house_type_id
        LEFT OUTER JOIN house_subtype s ON s.house_subtype_id=h.house_subtype_id
        WHERE (h.location_area_id IS NULL  OR h.location_area_id= ''
        OR h.house_type_id IS NULL OR h.house_type_id= '' OR h.house_subtype_id  IS NULL OR h.house_subtype_id ='')";
        $data9 = Yii::$app->db2->createCommand($sql_detail9)->queryAll();

        $dataProvider = new ArrayDataProvider([
            'allModels'=>$data9,
        ]);

        return $this->render('detail9', ['dataProvider' => $dataProvider]);
    }
    public function actionDetail10() {
        $sql_detail10 = "SELECT p.person_id,p.cid,CONCAT(p.pname,p.fname,p.lname) AS full_name,p.age_y,v.village_name,
        p.house_regist_type_id,CONCAT(d.person_discharge_id,' : ',d.person_discharge_name)AS discharge,p.last_update
        FROM person p
        LEFT OUTER JOIN village v ON v.village_id=p.village_id
        LEFT OUTER JOIN person_discharge d ON d.person_discharge_id=p.person_discharge_id
        WHERE (p.house_regist_type_id='' OR p.house_regist_type_id IS NULL)";
        $data10 = Yii::$app->db2->createCommand($sql_detail10)->queryAll();

        $dataProvider = new ArrayDataProvider([
            'allModels'=>$data10,
        ]);

        return $this->render('detail10', ['dataProvider' => $dataProvider]);
    }
        public function actionDetail11() {
        $date_start = "2015-10-01";
        $sql_detail11 = "SELECT xr.pt_xn,xr.hn,p.cid,CONCAT(p.pname,p.fname,p.lname) AS full_name   ,xr.order_date_time,xr.department,xr.xray_list ,xr.confirm_all
        FROM xray_head  xr
        left outer join patient p on p.hn=xr.hn
        WHERE xr.hn not in (SELECT hn FROM xrayxn WHERE regdate BETWEEN '$date_start' AND DATE(NOW()) )
        and  xr.order_date BETWEEN '$date_start' AND DATE(NOW())
        and (xr.pt_xn='' OR xr.pt_xn is null ) 
        group by   xr.hn
        order by xr.order_date DESC";
        $data11 = Yii::$app->db2->createCommand($sql_detail11)->queryAll();

        $dataProvider = new ArrayDataProvider([
            'allModels'=>$data11,
        ]);

        return $this->render('detail11', ['dataProvider' => $dataProvider]);
    }
        public function actionDetail12() {

        $sql_detail12 = "select i.hn,p.cid,concat(p.pname,p.fname,' ',p.lname) as full_name,i.an,concat(i.regdate,' ',i.regtime) regdatetime,if(i.dchtype='0','ยังไม่จำหน่าย','ไม่ทราบ') as dchtype
        from ipt  i
        left outer join patient p on p.hn=i.hn
        where (i.dchdate=' ' or i.dchdate is null) ";
        $data12 = Yii::$app->db2->createCommand($sql_detail12)->queryAll();

        $dataProvider = new ArrayDataProvider([
            'allModels'=>$data12,
        ]);

        return $this->render('detail12', ['dataProvider' => $dataProvider]);
    }
}
