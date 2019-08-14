<?php


class Unbeatable_Chat_Model_Observer
{

	public function sendOrderAck(Varien_Event_Observer $observer)
	{


	}


	public function sendShippedMessage(Varien_Event_Observer $observer)
	{



	}

	public function sendCompletedMessage(Varien_Event_Observer $observer)
	{


	}

	public function sendOrderCancelledSMS(Varien_Event_Observer $observer)
	{


	}

	/**
	 * Make a curl Request
	 */
	private function doRequest($data)
	{

		$curl = curl_init();
		curl_setopt_array($curl, array(
			CURLOPT_RETURNTRANSFER => 1,
			CURLOPT_URL            => 'http://rain-cloud.co.uk/api/v1/sms/send',
			CURLOPT_USERAGENT      => 'Codular Sample cURL Request',
			CURLOPT_POST           => 1,
			CURLOPT_POSTFIELDS     => $data

		));

		$resp = curl_exec($curl);

		curl_close($curl);
	}
}