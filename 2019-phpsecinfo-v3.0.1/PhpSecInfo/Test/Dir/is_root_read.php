<?php
/**
 * Test class for is_root_read
 *
 * @author Glenn S Crystal <glenn@gcosoftware.com>
 */

/**
 * Require the PhpSecInfo_Test_Dir class
 */
require_once ('PhpSecInfo/Test/Test_Dir.php');

/**
 * Test class for function is_self_write
 * Checks if file permissions are proper for security.
 */
class PhpSecInfo_Test_Dir_Is_Root_Read extends PhpSecInfo_Test_Dir
{

    /**
     * This should be a <b>unique</b>, human-readable identifier for this test
     *
     * @public string
     */
    public $test_name = "is_root_read";

    public $recommended_value = 'None';

    /**
     * Return the current value for this Test
     *
     * @return
     */
    function _retrieveCurrentValue()
    {
        // Get current permissions
        if (is_writable('/')) {
            $this->current_value = 'Write+Read';
        } else if (is_readable('/')) {
            $this->current_value = 'Read-Only';
        } else {
            $this->current_value = 'None';
        }
    }

    /**
     * Checks to see if the function is enabled
     *
     * @return integer
     */
    function _execTest()
    {
        // Check permissions
        if ($this->current_value == 'None') {
            return PHPSECINFO_TEST_RESULT_OK;
        } else if ($this->current_value == 'Read-Only') {
            return PHPSECINFO_TEST_RESULT_NOTICE;
        } else {
            return PHPSECINFO_TEST_RESULT_WARN;
        }
    }

    /**
     * Set the messages specific to this test.
     */
    function _setMessages()
    {
        parent::_setMessages();
        /* en */
        $this->setMessageForResult(PHPSECINFO_TEST_RESULT_OK, 'en', "No permissions granted for the root ('/') directory. This is the most secure setup.");
        /* L'affichage du message Warn n'est pas défini. */
        $this->setMessageForResult(PHPSECINFO_TEST_RESULT_WARN, 'en', "Write permission enabled for the root ('/') directory! You should never allow writing outside your www base.");
        $this->setMessageForResult(PHPSECINFO_TEST_RESULT_NOTICE, 'en', "Normally, you should never allow the root ('/') to be read. You should never allow writing outside your www base. Enable and set the value of open_basedir to correct this problem from the PHP configuration.");

        /* fr */
        $this->setMessageForResult(PHPSECINFO_TEST_RESULT_OK, 'fr', "Aucune autorisation accordée pour le répertoire racine ('/'). Il s'agit de la configuration la plus sécurisée.");
        /* L'affichage du message Warn n'est pas défini. */
        $this->setMessageForResult(PHPSECINFO_TEST_RESULT_WARN, 'fr', "Autorisation d'écriture activée pour le répertoire racine ('/')! Vous ne devez jamais autoriser l'écriture en dehors de votre base www.");
        $this->setMessageForResult(PHPSECINFO_TEST_RESULT_NOTICE, 'fr', "En temps normal, vous ne devriez jamais autoriser la lecture de la racine ('/'). Vous ne devez jamais autoriser l'écriture en dehors de votre base www. Activer et définir la valeur de open_basedir pour corriger ce problème depuis la configuration de PHP.");

        /* ru */
        $this->setMessageForResult(PHPSECINFO_TEST_RESULT_OK, 'fr', "Нет прав для корневого каталога ('/'). Это самая безопасная конфигурация.");
        /* L'affichage du message Warn n'est pas défini. */
        $this->setMessageForResult(PHPSECINFO_TEST_RESULT_WARN, 'fr', "Разрешение на запись активировано для корневого каталога ('/')! Вы никогда не должны позволять писать за пределами вашей базы www.");
        $this->setMessageForResult(PHPSECINFO_TEST_RESULT_NOTICE, 'fr', "Обычно вы никогда не должны позволять читать корень ('/'). Вы никогда не должны позволять писать за пределами вашей базы www. Включите и установите значение open_basedir, чтобы исправить эту проблему из конфигурации PHP.");
        
    }
}