<?php

namespace frontend\modules\reporthosxp\controllers;

use yii\web\Controller;
use yii\db\Query;
use Yii;
use yii\data\ArrayDataProvider;

// Add AccessControl
use mdm\admin\components\AccessControl;
use yii\filters\VerbFilter;

class ReporthosxpController extends Controller {
  public function behaviors(){
      return [
          'access' => [
              'class' => AccessControl::className(),
              'allowActions' => ['index','rep1','rep2','rep3','rep4','rep5','rep6','rep7','rep8','rep9','rep10']
          ],

          'verbs' => [
              'class' => VerbFilter::className(),
              'actions' => [
                  'logout' => ['post'],
              ],
          ],
      ];
  }

    public function actionIndex(){
        return $this->render('index');
    }
    
    public function actionRep1() {
        return $this->render('report1');
    }

    public function actionRep2() {
        
        $date1 = "2014-10-01";
        $date2 = date('Y-m-d');
        if (Yii::$app->request->isPost) {
            $date1 = $_POST['date1'];
            $date2 = $_POST['date2'];
        }


        $sql = "select 'ประกันสุขภาพ UC' as pttype,count(v.vn)as visit,count(distinct hn)as Person,sum(v.income)as sum_price
        from vn_stat v
        inner join pttype p on p.pttype=v.pttype
        inner join provis_instype pi on pi.code=p.nhso_code
        where v.vstdate between  '$date1'and '$date2' and p.pttype_spp_id in (3,4)
        and v.pdx in (
        select code from icd101 where ( code like 'a%' or code like 'b%' or code like 'c%'
        or code like 'd%' or code like 'e%' or code like 'f%' or code like 'g%' or code like 'h%' or code like 'i%'
        or code like 'j%' or code like 'k%' or code like 'l%' or code like 'm%' or code like 'n%' or code like 'o%'
        or code like 'p%' or code like 'q%' or code like 'r%' or code like 's%' or code like 't%' or code like 'u%'
        or code like 'v%' or code like 'w%' or code like 'x%' or code like 'y%'
        or code in ('z480','z012','z017','z016','z242','z235','z436','z434','z390') or code between 'z20' and 'z299'))

        union
        select 'ประกันสังคม' as pttype,count(v.vn)as visit,count(distinct hn)as Person,sum(v.income)as sum_price
        from vn_stat v inner join pttype p on p.pttype=v.pttype inner join provis_instype pi on pi.code=p.nhso_code
        where v.vstdate between '$date1'and '$date2'and p.pttype_spp_id in (2)
        and v.pdx in (
        select code from icd101 where ( code like 'a%' or code like 'b%' or code like 'c%'
        or code like 'd%' or code like 'e%' or code like 'f%' or code like 'g%' or code like 'h%' or code like 'i%'
        or code like 'j%' or code like 'k%' or code like 'l%' or code like 'm%' or code like 'n%' or code like 'o%'
        or code like 'p%' or code like 'q%' or code like 'r%' or code like 's%' or code like 't%' or code like 'u%'
        or code like 'v%' or code like 'w%' or code like 'x%' or code like 'y%'
        or code in ('z480','z012','z017','z016','z242','z235','z436','z434','z390') or code between 'z20' and 'z299'))

        union
        select 'ข้าราชการ' as pttype,count(v.vn)as visit,count(distinct hn)as Person,sum(v.income)as sum_price
        from vn_stat v
        inner join pttype p on p.pttype=v.pttype
        inner join provis_instype pi on pi.code=p.nhso_code
        where v.vstdate between '$date1'and '$date2' and p.pttype_spp_id in (1)
        and v.pdx in (
        select code from icd101 where ( code like 'a%' or code like 'b%' or code like 'c%'
        or code like 'd%' or code like 'e%' or code like 'f%' or code like 'g%' or code like 'h%' or code like 'i%'
        or code like 'j%' or code like 'k%' or code like 'l%' or code like 'm%' or code like 'n%' or code like 'o%'
        or code like 'p%' or code like 'q%' or code like 'r%' or code like 's%' or code like 't%' or code like 'u%'
        or code like 'v%' or code like 'w%' or code like 'x%' or code like 'y%'
        or code in ('z480','z012','z017','z016','z242','z235','z436','z434','z390') or code between 'z20' and 'z299'))

        union
        select 'ต่างด้าว' as pttype,count(v.vn)as visit,count(distinct hn)as Person,sum(v.income)as sum_price
        from vn_stat v
        inner join pttype p on p.pttype=v.pttype
        inner join provis_instype pi on pi.code=p.nhso_code
        where v.vstdate between '$date1'and '$date2' and p.pttype_spp_id in (5)
        and v.pdx in (
        select code from icd101 where ( code like 'a%' or code like 'b%' or code like 'c%'
        or code like 'd%' or code like 'e%' or code like 'f%' or code like 'g%' or code like 'h%' or code like 'i%'
        or code like 'j%' or code like 'k%' or code like 'l%' or code like 'm%' or code like 'n%' or code like 'o%'
        or code like 'p%' or code like 'q%' or code like 'r%' or code like 's%' or code like 't%' or code like 'u%'
        or code like 'v%' or code like 'w%' or code like 'x%' or code like 'y%'
        or code in ('z480','z012','z017','z016','z242','z235','z436','z434','z390') or code between 'z20' and 'z299'))

        union
        select 'อื่นๆ' as pttype,count(v.vn)as visit,count(distinct hn)as Person,sum(v.income)as sum_price
        from vn_stat v
        inner join pttype p on p.pttype=v.pttype
        inner join provis_instype pi on pi.code=p.nhso_code
        where v.vstdate between '$date1'and '$date2' and p.pttype_spp_id in (6,7)
        and v.pdx in (
        select code from icd101 where ( code like 'a%' or code like 'b%' or code like 'c%'
        or code like 'd%' or code like 'e%' or code like 'f%' or code like 'g%' or code like 'h%' or code like 'i%'
        or code like 'j%' or code like 'k%' or code like 'l%' or code like 'm%' or code like 'n%' or code like 'o%'
        or code like 'p%' or code like 'q%' or code like 'r%' or code like 's%' or code like 't%' or code like 'u%'
        or code like 'v%' or code like 'w%' or code like 'x%' or code like 'y%'
        or code in ('z480','z012','z017','z016','z242','z235','z436','z434','z390') or code between 'z20' and 'z299')) ";


        $data = Yii::$app->db2->createCommand($sql)->queryAll();
        $dataProvider = new ArrayDataProvider([
            'allModels'=>$data,
        ]);

        return $this->render('report2', ['dataProvider' => $dataProvider, 'chart' => $data,'sql' => $sql,'date1' => $date1, 'date2' => $date2]);
    }

    public function actionRep3() {

        $date1 = "2014-10-01";
        $date2 = date('Y-m-d');
        $se = "5";
        if (Yii::$app->request->isPost) {
            $date1 = $_POST['date1'];
            $date2 = $_POST['date2'];
            $se = $_POST['se'];
        }

        $sql = "SELECT a.pdx,i.name AS icdname,COUNT(a.pdx) AS pdx_count,COUNT(DISTINCT a.hn) AS hn_count,COUNT(DISTINCT a.vn) AS visit_count
        FROM vn_stat a
        LEFT OUTER JOIN icd101 i ON i.code=a.main_pdx
        WHERE a.vstdate BETWEEN '$date1'and '$date2'
        AND a.pdx<>'' AND a.pdx IS NOT NULL
        AND a.pdx NOT LIKE 'z%'
        GROUP BY a.pdx,i.name
        ORDER BY pdx_count DESC
        LIMIT $se ";

        $data = Yii::$app->db2->createCommand($sql)->queryAll();
        $dataProvider = new ArrayDataProvider([
            'allModels'=>$data,
        ]);

        return $this->render('report3', ['dataProvider' => $dataProvider, 'chart' => $data,'sql' => $sql,'date1' => $date1, 'date2' => $date2,'se' => $se]);
    }
    
        public function actionRep4() {

        $date1 = "2014-10-01";
        $date2 = date('Y-m-d');
        $se = "5";
        if (Yii::$app->request->isPost) {
            $date1 = $_POST['date1'];
            $date2 = $_POST['date2'];
            $se = $_POST['se'];
        }

        $sql = "SELECT a.pdx,i.name AS icdname,COUNT(a.pdx) AS pdx_count,COUNT(DISTINCT a.hn) AS hn_count,COUNT(DISTINCT a.an) AS visit_count
        FROM an_stat a
        LEFT OUTER JOIN icd101 i ON i.code=a.pdx
        WHERE a.dchdate BETWEEN  '$date1'and '$date2'
        AND a.pdx<>'' AND a.pdx IS NOT NULL
        AND a.pdx NOT LIKE 'z%'
        GROUP BY a.pdx,i.name
        ORDER BY pdx_count DESC
        LIMIT $se ";

        $data = Yii::$app->db2->createCommand($sql)->queryAll();
        $dataProvider = new ArrayDataProvider([
            'allModels'=>$data,
        ]);

        return $this->render('report4', ['dataProvider' => $dataProvider, 'chart' => $data,'sql' => $sql,'date1' => $date1, 'date2' => $date2,'se' => $se]);
    }
    public function actionRep5() {
        $sql = "select v.village_name,count(*)as 'all_person' ,
                SUM(case WHEN (house_regist_type_id=1) THEN 1 ELSE '' END) as 'type1' ,
                SUM(case WHEN (house_regist_type_id=2) THEN 1 ELSE '' END) as 'type2' ,
                SUM(case WHEN (house_regist_type_id=3) THEN 1 ELSE '' END) as 'type3' ,
                SUM(case WHEN (house_regist_type_id=4) THEN 1 ELSE '' END) as 'type4' ,
                SUM(case WHEN (house_regist_type_id=5) THEN 1 ELSE '' END) as 'type5' ,
                round(SUM(case WHEN (house_regist_type_id in (1,3)) THEN 1 ELSE '' END),0) as 'type1+3' 
                from person p 
                INNER JOIN village v ON v.village_id=p.village_id
                where p.death<>'Y'
                GROUP BY v.village_id ";

        $data = Yii::$app->db2->createCommand($sql)->queryAll();
        $dataProvider = new ArrayDataProvider([
            'allModels'=>$data,
        ]);

        return $this->render('report5', ['dataProvider' => $dataProvider,'chart' => $data,'sql' => $sql]);
    }
    public function actionRep6() {
        $sql = "SELECT c.name AS clinic_name,COUNT(DISTINCT cl.hn) AS cc
                FROM clinicmember    cl
                LEFT OUTER JOIN clinic c ON c.clinic=cl.clinic
                WHERE c.chronic='Y' AND c.no_export<>'Y'
                AND cl.clinic_member_status_id IN ('3','4')
                GROUP BY cl.clinic
                ORDER BY cl.clinic ";

        $data = Yii::$app->db2->createCommand($sql)->queryAll();
        $dataProvider = new ArrayDataProvider([
            'allModels'=>$data,
        ]);

        return $this->render('report6', ['dataProvider' => $dataProvider,'chart' => $data,'sql' => $sql]);
    }
    public function actionRep7() {
        $sql = "SELECT  c.name AS clinic_name,COUNT(DISTINCT pc.person_id) AS cc
                FROM person_chronic    pc
                LEFT OUTER JOIN  clinic c ON  c.clinic=pc.clinic
                LEFT OUTER JOIN  person p ON   p.person_id=pc.person_id
                WHERE c.chronic='Y'
                AND pc.clinic_member_status_id IN ('3','4')
                AND p.house_regist_type_id IN ('1','3')
                GROUP BY pc.clinic
                ORDER BY pc.clinic";

        $data = Yii::$app->db2->createCommand($sql)->queryAll();
        $dataProvider = new ArrayDataProvider([
            'allModels'=>$data,
        ]);

        return $this->render('report7', ['dataProvider' => $dataProvider,'chart' => $data,'sql' => $sql]);
    }
        
    public function actionRep8() {
        
        $date1 = "2014-10-01";
        $date2 = date('Y-m-d');
        if (Yii::$app->request->isPost) {
            $date1 = $_POST['date1'];
            $date2 = $_POST['date2'];
        }

        $sql_sim01 = "select count(v.vn) as cc from vn_stat  v where  v.vstdate BETWEEN  '$date1'and '$date2' ";         
        $sql_sim02 = "select sum( ov.admdate ) as chn from an_stat ov, ipt ovst where ov.an=ovst.an and ov.dchdate BETWEEN  '$date1'and '$date2' ";
        $sql_sim03 = "select count(DISTINCT an) as cc from an_stat where dchdate BETWEEN  '$date1'and '$date2' and pdx='O800' ";                        
        $sql_sim04 = "select count(DISTINCT an) as cc from an_stat where dchdate BETWEEN  '$date1'and '$date2'and pdx between 'O81'  and 'O83' ";              
        $sql_sim05 = "select count(DISTINCT dn) as cc from dtmain  where vstdate BETWEEN  '$date1'and '$date2' ";       
        
        $sql_sim06 = "select count(distinct hn) as hn_count
        from xray_report r
        left outer join xray_report_film rf on rf.xn=r.xn
        left outer join xray_film f on f.film_id=rf.film_id
        where r.report_date BETWEEN  '$date1'and '$date2' ";       
        
        $sql_sim07_1 = "select  count(distinct v.vn) cc_vn
        from  vn_stat  v
        where  v.vstdate BETWEEN  '$date1'and '$date2'
        and v.pdx like 'M%'
        and v.vn in (select vn from physic_main where vstdate BETWEEN  '$date1'and '$date2')";       
        
        $sql_sim07_2 = "select  count(distinct a.an)  as cc_an
        from an_stat  a
        where  a.dchdate BETWEEN  '$date1'and '$date2'
        and a.pdx  like 'M%'
        and a.an in  (select an from physic_main_ipd where vstdate BETWEEN  '$date1'and '$date2') ";       
        
        $sql_sim08_1 = "select count(distinct v.vn) cc_vn
        from  vn_stat  v
        where v.vstdate BETWEEN  '$date1'and '$date2'
        AND  ((v.pdx BETWEEN 'G00' AND 'G99')
        OR (v.pdx BETWEEN 'H00' AND 'H99')
        OR (v.pdx BETWEEN 'F00' AND 'F99'))
        AND v.vn in (select vn from physic_main where vstdate BETWEEN  '$date1'and '$date2' )";       
        
        $sql_sim08_2 = "select  count(distinct a.an)  as cc_an
        from an_stat  a
        where a.dchdate BETWEEN  '$date1'and '$date2'
        AND ((a.pdx BETWEEN 'G00' AND 'G99')
        OR (a.pdx BETWEEN 'H00' AND 'H99')
        OR (a.pdx BETWEEN 'F00' AND 'F99'))
        and a.an in  (select an from physic_main_ipd where vstdate BETWEEN  '$date1'and '$date2')";       
        
        $sql_sim09_1 = "select  count(distinct v.vn) cc_vn
        from  vn_stat  v
        where  v.vstdate BETWEEN  '$date1'and '$date2' and  v.pdx like 'I%'
        or v.pdx like 'J%'
        and v.vn in (select vn from physic_main where vstdate BETWEEN  '$date1'and '$date2') ";       
        
        $sql_sim09_2 = "select  count(distinct a.an)  as cc_an
        from an_stat  a
        where  a.dchdate BETWEEN  '$date1'and '$date2' and a.pdx like 'I%'
        or a.pdx like 'J%'
        and a.an in (select an from physic_main_ipd where vstdate BETWEEN  '$date1'and '$date2') ";       
        
        $sql_sim10_1 = "select  count(distinct v.vn) cc_vn
        from  vn_stat  v
        where  v.vstdate BETWEEN  '$date1'and '$date2'
        and (v.pdx like 'A%'
        or v.pdx like 'B%' or v.pdx between 'E00' and 'E89'
        or v.pdx like 'C%' or v.pdx like 'D%'
        or v.pdx like 'P%' or v.pdx like 'Q%'
        or v.pdx like 'R%' or v.pdx like 'Z%')
        and v.vn in(select vn from physic_main where vstdate BETWEEN  '$date1'and '$date2')";       
        
        $sql_sim10_2 = "select  count(distinct a.an)  as cc_an
        from an_stat  a
        where  a.dchdate BETWEEN  '$date1'and '$date2'
        and (a.pdx like 'A%'
        or a.pdx like 'B%' or a.pdx between 'E00' and 'E89'
        or a.pdx like 'C%' or a.pdx like 'D%'
        or a.pdx like 'P%' or a.pdx like 'Q%'
        or a.pdx like 'R%' or a.pdx like 'Z%')
        and a.an in(select an from physic_main_ipd where vstdate BETWEEN  '$date1'and '$date2')";       

        
        $result01 = Yii::$app->db2->createCommand($sql_sim01)->queryScalar();
        $result02 = Yii::$app->db2->createCommand($sql_sim02)->queryScalar();
        $result03 = Yii::$app->db2->createCommand($sql_sim03)->queryScalar();
        $result04 = Yii::$app->db2->createCommand($sql_sim04)->queryScalar();
        $result05 = Yii::$app->db2->createCommand($sql_sim05)->queryScalar();
        $result06 = Yii::$app->db2->createCommand($sql_sim06)->queryScalar();
        $result07_1 = Yii::$app->db2->createCommand($sql_sim07_1)->queryScalar();
        $result07_2 = Yii::$app->db2->createCommand($sql_sim07_2)->queryScalar();
        $result08_1 = Yii::$app->db2->createCommand($sql_sim08_1)->queryScalar();
        $result08_2 = Yii::$app->db2->createCommand($sql_sim08_2)->queryScalar();
        $result09_1 = Yii::$app->db2->createCommand($sql_sim09_1)->queryScalar();
        $result09_2 = Yii::$app->db2->createCommand($sql_sim09_2)->queryScalar();
        $result10_1 = Yii::$app->db2->createCommand($sql_sim10_1)->queryScalar();
        $result10_2 = Yii::$app->db2->createCommand($sql_sim10_2)->queryScalar();
        
        
        return $this->render('report8', [
        'sim01' => $result01,
        'sim02' => $result02,
        'sim03' => $result03,
        'sim04' => $result04,
        'sim05' => $result05,
        'sim06' => $result06,
        'sim07_1' => $result07_1,
        'sim07_2' => $result07_2,
        'sim08_1' => $result08_1,
        'sim08_2' => $result08_2,
        'sim09_1' => $result09_1,
        'sim09_2' => $result09_2,
        'sim10_1' => $result10_1,
        'sim10_2' => $result10_2,
        'date1' => $date1, 'date2' => $date2]);
    }
}
