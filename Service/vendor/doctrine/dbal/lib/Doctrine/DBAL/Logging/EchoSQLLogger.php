<?php
/*
 * THIS SOFTWARE IS PROVIDED BY THE COPYRIGHT HOLDERS AND CONTRIBUTORS
 * "AS IS" AND ANY EXPRESS OR IMPLIED WARRANTIES, INCLUDING, BUT NOT
 * LIMITED TO, THE IMPLIED WARRANTIES OF MERCHANTABILITY AND FITNESS FOR
 * A PARTICULAR PURPOSE ARE DISCLAIMED. IN NO EVENT SHALL THE COPYRIGHT
 * OWNER OR CONTRIBUTORS BE LIABLE FOR ANY DIRECT, INDIRECT, INCIDENTAL,
 * SPECIAL, EXEMPLARY, OR CONSEQUENTIAL DAMAGES (INCLUDING, BUT NOT
 * LIMITED TO, PROCUREMENT OF SUBSTITUTE GOODS OR SERVICES; LOSS OF USE,
 * DATA, OR PROFITS; OR BUSINESS INTERRUPTION) HOWEVER CAUSED AND ON ANY
 * THEORY OF LIABILITY, WHETHER IN CONTRACT, STRICT LIABILITY, OR TORT
 * (INCLUDING NEGLIGENCE OR OTHERWISE) ARISING IN ANY WAY OUT OF THE USE
 * OF THIS SOFTWARE, EVEN IF ADVISED OF THE POSSIBILITY OF SUCH DAMAGE.
 *
 * This software consists of voluntary contributions made by many individuals
 * and is licensed under the MIT license. For more information, see
 * <http://www.doctrine-project.org>.
 */

namespace Doctrine\DBAL\Logging;

/**
 * A SQL logger that logs to the standard output using echo/var_dump.
 *
 * @link   www.doctrine-project.org
 * @since  2.0
 * @author Benjamin Eberlei <kontakt@beberlei.de>
 * @author Guilherme Blanco <guilhermeblanco@hotmail.com>
 * @author Jonathan Wage <jonwage@gmail.com>
 * @author Roman Borschel <roman@code-factory.org>
 */
class EchoSQLLogger implements SQLLogger
{
	private $memcache;
	
    /**
     * {@inheritdoc}
     */
    public function startQuery($sql, array $params = null, array $types = null)
    {
		$date = new \DateTime();
		$output= "";
		
		ob_start();
		echo PHP_EOL;
		date_default_timezone_set('America/Chicago');
		$date = date('m/d/Y h:i:s a', time());	
		echo $date;
		echo PHP_EOL;
        echo $sql . PHP_EOL;

        if ($params) {
            var_dump($params);
        }

        if ($types) {
            var_dump($types);
        }
		
		$output = ob_get_contents();
		
		$filehandle = fopen("c:\\wamp\\www\\service\\sql_logger.txt", "a");
		if($filehandle == null)
			echo "cannot create file";
		else 
		{
			fwrite($filehandle, $output);
			fclose($filehandle);			
		}
		
		
//now log cache stats	
	$ret = $this->memcache->doGetStats();
	var_dump($ret);
		$output = ob_get_contents();
		
		$filehandle = fopen("c:\\wamp\\www\\service\\cache_logger.txt", "a");
		if($filehandle == null)
			echo "cannot create file";
		else 
		{
			fwrite($filehandle, $output);
			fclose($filehandle);			
		}	
		//echo "sql logged to file";
		ob_end_clean();
		
    }

    /**
     * {@inheritdoc}
     */
    public function stopQuery()
    {
    }
	
	public function set_memcache($mem)
	{
		$this->memcache = $mem;
	}
}
