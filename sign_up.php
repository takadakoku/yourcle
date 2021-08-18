<?php

require_once(__DIR__ . "/admin/config.php");

   $sign_up = new Sign_Up;
   $sign_up->sign_up();

?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
<link rel="stylesheet"  href="style/sign_up.css">
   <link rel="shortcut icon" href="parts/favicon.ico">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.4/jquery.min.js"></script>
   <link href="https://use.fontawesome.com/releases/v5.6.1/css/all.css" rel="stylesheet">
<title><?= $title;?></title>
</head>
<body>
<?php get_header();?>
<div id="content">
    <h1>Sign Up</h1>
  <form action="" method="POST">
    <div id="not_submit"> 
    <p>ユーザー名（アプリ上の名前です）</p>
    <input type="text" class="textbox" name="user_name" placeholder="Student Name" value="">
    <p>harukaメール</p>
    <input type="text" class="textbox" name="haruka" placeholder="haruka mail" value="">
    <h2>利用規約</h2>
            <label class="desc">
            以下の内容をご確認の上、ご同意いただける場合<br>
            「同意する」にチェックをして、<br>「次へ進む」をクリックしてください。
            </label>
    <div class="terms">
            <strong>第1条 総則</strong><br>
            利用規約<br>
            <br>
            この利用規約（以下、「本規約」といいます。）は当社）がこのウェブサイト上で提供するサービス（以下、「本サービス」といいます。）の利用条件を定めるものです。登録ユーザーの皆さま（以下、「ユーザー」といいます。）には、本規約に従って、本サービスをご利用いただきます。<br>
            第1条（適用）<br>
            1. 本規約は、ユーザーと当社との間の本サービスの利用に関わる一切の関係に適用されるものとします。<br>
            2. 当社は本サービスに関し、本規約のほか、ご利用にあたってのルール等、各種の定め（以下、「個別規定」といいます。）をすることがあります。これら個別規定はその名称のいかんに関わらず、本規約の一部を構成するものとします。<br>
            3. 本規約の規定が前条の個別規定の規定と矛盾する場合には、個別規定において特段の定めなき限り、個別規定の規定が優先されるものとします。<br><br>
            第2条（利用登録）<br>
            4. 本サービスにおいては、登録希望者が本規約に同意の上、当社の定める方法によって利用登録を申請し、当社がこの承認を登録希望者に通知することによって、利用登録が完了するものとします。<br>
            5. 当社は、利用登録の申請者に以下の事由があると判断した場合、利用登録の申請を承認しないことがあり、その理由については一切の開示義務を負わないものとします。 <br>
              1. 利用登録の申請に際して虚偽の事項を届け出た場合<br>
              2. 本規約に違反したことがある者からの申請である場合<br>
              3. その他、当社が利用登録を相当でないと判断した場合<br><br>
            第3条（ユーザーIDおよびパスワードの管理）<br>
            6. ユーザーは、自己の責任において、本サービスのユーザーIDおよびパスワードを適切に管理するものとします。<br>
            7. ユーザーは、いかなる場合にも、ユーザーIDおよびパスワードを第三者に譲渡または貸与し、もしくは第三者と共用することはできません。当社は、ユーザーIDとパスワードの組み合わせが登録情報と一致してログインされた場合には、そのユーザーIDを登録しているユーザー自身による利用とみなします。<br>
            8. ユーザー登録は、必ず本人が行ってください。また、ユーザー登録の際は、必ず正確な情報を入力してください。<br>
            9. 個人のユーザー及びユーザー登録をされようとする方（以下併せて「ユーザー等」といいます）は、複数のユーザー登録を行うことができないものとします。<br>
            10. ユーザーID及びパスワードが第三者によって使用されたことによって生じた損害や、アカウント情報の管理不十分による情報の漏洩、使用上の過誤、第三者の使用、不正アクセス等による損害の責任はユーザーが負うものとし、弊社の故意又は過失に起因する場合を除き、弊社は責任を負わないものとします。<br>
            <br>
            第4条（利用料金および支払方法）<br>
            11. ユーザーは、本サービスの有料部分の対価として、当社が別途定め、本ウェブサイトに表示する利用料金を、当社が指定する方法により支払うものとします。<br>
            12. ユーザーが利用料金の支払を遅滞した場合には、ユーザーは年14．6％の割合による遅延損害金を支払うものとします。<br>
            <br>第5条（禁止事項）<br>
            ユーザーは、本サービスの利用にあたり、以下の行為をしてはなりません。<br>
            13. 法令または公序良俗に違反する行為<br>
            14. 犯罪行為に関連する行為<br>
            15. 当社、本サービスの他のユーザー、または第三者のサーバーまたはネットワークの機能を破壊したり、妨害したりする行為<br>
            16. 当社のサービスの運営を妨害するおそれのある行為<br>
            17. 他のユーザーに関する個人情報等を収集または蓄積する行為<br>
            18. 不正アクセスをし、またはこれを試みる行為<br>
            19. 他のユーザーに成りすます行為<br>
            20. 当社のサービスに関連して、反社会的勢力に対して直接または間接に利益を供与する行為<br>
            21. 当社、本サービスの他のユーザーまたは第三者の知的財産権、肖像権、プライバシー、名誉その他の権利または利益を侵害する行為<br>
            22. 以下の表現を含み、または含むと当社が判断する内容を本サービス上に投稿し、または送信する行為 <br>
              1. 過度に暴力的な表現<br>
              2. 露骨な性的表現<br>
              3. 人種、国籍、信条、性別、社会的身分、門地等による差別につながる表現<br>
              4. 自殺、自傷行為、薬物乱用を誘引または助長する表現<br>
              5. その他反社会的な内容を含み他人に不快感を与える表現<br>
            23. 以下を目的とし、または目的とすると当社が判断する行為 <br>
              1. 営業、宣伝、広告、勧誘、その他営利を目的とする行為（当社の認めたものを除きます。）<br>
              2. 性行為やわいせつな行為を目的とする行為<br>
              3. 面識のない異性との出会いや交際を目的とする行為<br>
              4. 他のユーザーに対する嫌がらせや誹謗中傷を目的とする行為<br>
              5. 当社、本サービスの他のユーザー、または第三者に不利益、損害または不快感を与えることを目的とする行為<br>
              6. その他本サービスが予定している利用目的と異なる目的で本サービスを利用する行為<br>
            24. 宗教活動または宗教団体への勧誘行為<br>
            25. その他、当社が不適切と判断する行為<br>
            <br>第6条（本サービスの提供の停止等）<br>
            26. 当社は、以下のいずれかの事由があると判断した場合、ユーザーに事前に通知することなく本サービスの全部または一部の提供を停止または中断することができるものとします。 <br>
              1. 本サービスにかかるコンピュータシステムの保守点検または更新を行う場合<br>
              2. 地震、落雷、火災、停電または天災などの不可抗力により、本サービスの提供が困難となった場合<br>
              3. コンピュータまたは通信回線等が事故により停止した場合<br>
              4. その他、当社が本サービスの提供が困難と判断した場合<br>
            27. 当社は、本サービスの提供の停止または中断により、ユーザーまたは第三者が被ったいかなる不利益または損害についても、一切の責任を負わないものとします。<br>
            <br>第7条（著作権）<br>
            28. ユーザーは、自ら著作権等の必要な知的財産権を有するか、または必要な権利者の許諾を得た文章、画像や映像等の情報に関してのみ、本サービスを利用し、投稿ないしアップロードすることができるものとします。<br>
            29. ユーザーが本サービスを利用して投稿ないしアップロードした文章、画像、映像等の著作権については、当該ユーザーその他既存の権利者に留保されるものとします。ただし、当社は、本サービスを利用して投稿ないしアップロードされた文章、画像、映像等について、本サービスの改良、品質の向上、または不備の是正等ならびに本サービスの周知宣伝等に必要な範囲で利用できるものとし、ユーザーは、この利用に関して、著作者人格権を行使しないものとします。<br>
            30. 前項本文の定めるものを除き、本サービスおよび本サービスに関連する一切の情報についての著作権およびその他の知的財産権はすべて当社または当社にその利用を許諾した権利者に帰属し、ユーザーは無断で複製、譲渡、貸与、翻訳、改変、転載、公衆送信（送信可能化を含みます。）、伝送、配布、出版、営業使用等をしてはならないものとします。<br>
            <br>第8条（利用制限および登録抹消）<br>
            31. 当社は、ユーザーが以下のいずれかに該当する場合には、事前の通知なく、投稿データを削除し、ユーザーに対して本サービスの全部もしくは一部の利用を制限しまたはユーザーとしての登録を抹消することができるものとします。 <br>
              1. 本規約のいずれかの条項に違反した場合<br>
              2. 登録事項に虚偽の事実があることが判明した場合<br>
              3. 他のユーザーや第三者に不当に迷惑をかけた場合<br>
              4. 決済手段として当該ユーザーが届け出たクレジットカードが利用停止となった場合<br>
              5. 料金等の支払債務の不履行があった場合<br>
              6. 当社からの連絡に対し、一定期間返答がない場合<br>
              7. 本サービスについて、最終の利用から一定期間利用がない場合<br>
              8. その他、当社が本サービスの利用を適当でないと判断した場合<br>
            32. 前項各号のいずれかに該当した場合、ユーザーは、当然に当社に対する一切の債務について期限の利益を失い、その時点において負担する一切の債務を直ちに一括して弁済しなければなりません。<br>
            33. 当社は、本条に基づき当社が行った行為によりユーザーに生じた損害について、一切の責任を負いません。<br>
            34. 弊社は、本条の措置を受けたユーザーに対し、将来にわたって弊社が提供するサービスの利用及びアクセスを禁止することができるものとします。<br>
            35. 弊社は、本条の措置により生じる損害について、弊社の故意又は過失に起因する場合を除き、責任を負わないものとします。<br>
            <br>第9条（退会）<br>
            ユーザーは、当社の定める退会手続により、本サービスから退会できるものとします。<br>
            <br>第10条（保証の否認および免責事項）<br>
            36. 当社は、本サービスに事実上または法律上の瑕疵（安全性、信頼性、正確性、完全性、有効性、特定の目的への適合性、セキュリティなどに関する欠陥、エラーやバグ、権利侵害などを含みます。）がないことを明示的にも黙示的にも保証しておりません。<br>
            37. 当社は、本サービスに起因してユーザーに生じたあらゆる損害について一切の責任を負いません。ただし、本サービスに関する当社とユーザーとの間の契約（本規約を含みます。）が消費者契約法に定める消費者契約となる場合、この免責規定は適用されません。<br>
            38. 前項ただし書に定める場合であっても、当社は、当社の過失（重過失を除きます。）による債務不履行または不法行為によりユーザーに生じた損害のうち特別な事情から生じた損害（当社またはユーザーが損害発生につき予見し、または予見し得た場合を含みます。）について一切の責任を負いません。また、当社の過失（重過失を除きます。）による債務不履行または不法行為によりユーザーに生じた損害の賠償は、ユーザーから当該損害が発生した月に受領した利用料の額を上限とします。<br>
            39. 当社は、本サービスに関して、ユーザーと他のユーザーまたは第三者との間において生じた取引、連絡または紛争等について一切責任を負いません。<br>
            <br>第11条（サービス内容の変更等）<br>
            当社は、ユーザーに通知することなく、本サービスの内容を変更しまたは本サービスの提供を中止することができるものとし、これによってユーザーに生じた損害について一切の責任を負いません。<br>
            <br>第12条（利用規約の変更）<br>
            当社は、必要と判断した場合には、ユーザーに通知することなくいつでも本規約を変更することができるものとします。なお、本規約の変更後、本サービスの利用を開始した場合には、当該ユーザーは変更後の規約に同意したものとみなします。<br>
            <br>第13条（個人情報の取扱い）<br>
            当社は、本サービスの利用によって取得する個人情報については、当社「プライバシーポリシー」に従い適切に取り扱うものとします。<br>
            <br>第14条（通知または連絡）<br>
            ユーザーと当社との間の通知または連絡は、当社の定める方法によって行うものとします。当社は,ユーザーから,当社が別途定める方式に従った変更届け出がない限り,現在登録されている連絡先が有効なものとみなして当該連絡先へ通知または連絡を行い,これらは,発信時にユーザーへ到達したものとみなします。<br>
            <br>第15条（権利義務の譲渡の禁止）<br>
            ユーザーは、当社の書面による事前の承諾なく、利用契約上の地位または本規約に基づく権利もしくは義務を第三者に譲渡し、または担保に供することはできません。<br>
            <br>第16条（準拠法・裁判管轄）<br>
            40. 本規約の解釈にあたっては、日本法を準拠法とします。<br>
            41. 本サービスに関して紛争が生じた場合には、当社の本店所在地を管轄する裁判所を専属的合意管轄とします。<br>
            <br>
            第17条 (商品の出品）<br>
            42. 出品者は、弊社所定の手続に従い商品の出品を行うものとします。出品は書籍に限られます。また、審査を行い、出品者が基準に合致しない場合には、当該出品方法の利用を制限することができます。<br>
            43. ユーザーは、商品を出品する際に、真に売却する意思のない出品、その商品情報だけでは正しく商品を理解できない又は混乱する可能性のある出品、商品説明で十分な説明を行わない出品等を行ってはなりません。また、出品者は、出品する商品と関係のない画像等を当該出品情報として掲載してはいけません。<br>
            44. ユーザーは、出品にあたっては、古物営業法、特定商取引に関する法律、不当景品類及び不当表示防止法、不正競争防止法、商標法、著作権法その他の法令を遵守しなければなりません。<br>
            45. ユーザーは、他の特定のユーザーのみを対象とする販売を意図して商品を出品することができません。弊社は、その裁量により、出品の条件その他の状況から、ある商品の出品が他の特定のユーザーのみを対象とする販売を意図するものであるか否かを判断することができるものとします。<br>
            46. 出品に関して、弊社が本規約又は加盟店規約に違反する又は不適切であると合理的な理由に基づき判断した場合、弊社は、第 5 条に定める措置のほか、その出品やその出品に対して発生していた購入行為等を弊社の判断で取消すことができるものとします。本項に基づく措置によってユーザーに生じる損害について、弊社の故意又は過失に起因する場合を除き、弊社は責任を負わないものとします。<br>
            47. ユーザーの出品等によって、ユーザー及び第三者に生じる損害につき、弊社の故意又は過失に起因する場合を除き、弊社は責任を負わないものとします。<br>
            <br>
            第18条 (商品の購入）<br>
            48. ユーザーは、弊社の定める手続により購入の意思をもって、注文を行うものとします。<br>
            49. ユーザーは、購入する意思のない注文、転売等の営利を目的とした商品の購入等、及び弊社の判断でいたずら目的と見受けられる注文を行うことはできません。<br>
            50. 出品者は、自らの出品物を購入することはできません。出品を取り下げたい場合は、ユーザーは、弊社所定の手続に従って行うものとします。<br>
            51. ユーザーの注文、購入等によって、ユーザー及び第三者に生じる損害につき、弊社の故意又は過失に起因する場合を除き、弊社は責任を負わないものとします。<br>
            <br>
            第19条 (支払および取引の実行）<br>
            52. 購入者が出品された特定の商品の購入完了手続をした時をもって当該商品の売買契約が成立するものとします。出品者及び購入者は、売買契約に基づき発生した権利義務を第三者に譲渡、担保提供その他の処分することはできないものとします。<br>
            53. 売買契約が成立した場合、購入者は、弊社の定める方法により商品代金と利用料の合計額を支払うものとします。商品の送料は、出品者が負担する場合には、商品代金に含むものとし、購入者が負担する場合には、商品の発送を着払いで行うものとします。<br>
            54. 出品者は、購入者の商品代金の決済が完了した後に商品の発送をするものとします。<br>
            55. 本サービスの利用にあたり、出品者及び購入者間の合意がある場合を除き、商品の注文後のキャンセルはできないものとします。 商品に瑕疵がある場合、商品説明と実際の商品が明らかに異なる場合、梱包の不備により配送時に商品が破損したなどの場合は出品者が責任を負うものとし、出品者の責任及び費用により、返金、商品の返品、修理、交換等の対応を行うものとします。<br>
            以上<br>
    </div>
    <label>
    同意する<input type="radio" onclick="check()">
    </label>
    </div>
    
    <input type="submit" id="submit" name="card" class="button" disabled value="SIGN UP">
  </form>
  
  <script>
    function check(){
      elem = document.getElementById("submit");
      elem.disabled = false;
    }
  </script>
 
  <?php get_footer(); ?>
</body>
</html>
