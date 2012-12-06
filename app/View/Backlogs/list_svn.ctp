<?php
/**
 * Backlog management
 *
 * @since         2012-12-04
 * @version       $Revision$
 * @modifiedby    $LastChangedBy$
 * @lastmodified  $Date$
 */

?>
<style>
#list-svn {
    margin-top: 48px;
    margin-bottom: 48px;
}
</style>

<p class="lead"><?php echo $this->Html->link('Backlog', 'http://'.Configure::read('Backlog.url'), array('target' => '_blank')) ?>でSubversionを利用しているプロジェクトをリストアップします。</p>
<p><strong><?php echo h(Configure::read('Backlog.userName')) ?></strong>ユーザがBacklogを巡回して、Subversionのバージョン管理を利用しているプロジェクトを抜粋します。<br />調査対象にしたいプロジェクトには、<strong><?php echo h(Configure::read('Backlog.userName')) ?></strong>ユーザを参加させてください。</p>

<div id="list-svn">
    <table class="table table-striped">
        <thead>
            <tr>
                <th class="title">プロジェクト名</<th>
                <th class="svn">Subversion URL</<th>
            </tr>
        </thead>
        <tbody>
            <?php foreach($projects as $row) : ?>
                <tr>
                    <td class="title"><?php echo $this->Html->link($row['name'], $row['url'], array('target' => '_blank')) ?></td>
                    <td class="svn"><?php echo $this->Html->link($row['svn'], $row['svn'], array('target' => '_blank')) ?></td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>

    <p>設定で、「Backlogのサーバ上にリポジトリを作成し使用する」をチェックしたプロジェクトを全てリストアップしています。実際にはバージョン管理を利用していないプロジェクトも含まれているかもしれませんので、ご了承ください。</p>
    <p>Gitには対応していません。同じ要領で簡単に対応できるとは思います。</p>
</div>
