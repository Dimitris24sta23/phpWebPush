-- phpMyAdmin SQL Dump
-- version 4.5.4.1deb2ubuntu2
-- http://www.phpmyadmin.net
--
-- Φιλοξενητής: localhost
-- Χρόνος δημιουργίας: 27 Σεπ 2017 στις 17:31:36
-- Έκδοση διακομιστή: 5.7.19-0ubuntu0.16.04.1
-- Έκδοση PHP: 7.0.22-0ubuntu0.16.04.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Βάση δεδομένων: `xePush`
--

-- --------------------------------------------------------

--
-- Δομή πίνακα για τον πίνακα `devices`
--

CREATE TABLE `devices` (
  `device_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `payload` varchar(600) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Άδειασμα δεδομένων του πίνακα `devices`
--

INSERT INTO `devices` (`device_id`, `user_id`, `payload`) VALUES
(1, 1, '{"endpoint":"https://fcm.googleapis.com/fcm/send/cBNwdFmgRkM:APA91bEA_LW80bcLqdoLqGMRLLxIjjYV2T5j_nl6TzKEVSnkWFIzsTUFFAVdA8VSjZ5KDtX5-TJOEjC5JO1BD1Qx0OYB3oKXJkglmhq0pQdZcjPErG2uJhsAc-b-rzf0N7Fw8M6pmmC3","expirationTime":null,"keys":{"p256dh":"BBflGrZDozLZt-a57whM9NRJ5PR5ztblBiw8_uPQDfDGa_taZSH3rWqmFRCXbDxL-Mk2uiPM-tfIY7-BPW9gC5E=","auth":"Hb8gNOQjlDW1RJu8jjjz3A=="}}');

-- --------------------------------------------------------

--
-- Δομή πίνακα για τον πίνακα `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `email` varchar(100) NOT NULL,
  `age` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Άδειασμα δεδομένων του πίνακα `users`
--

INSERT INTO `users` (`id`, `email`, `age`) VALUES
(1, 'demo@demo.com', 20);

--
-- Ευρετήρια για άχρηστους πίνακες
--

--
-- Ευρετήρια για πίνακα `devices`
--
ALTER TABLE `devices`
  ADD PRIMARY KEY (`device_id`),
  ADD UNIQUE KEY `device_id` (`device_id`);

--
-- Ευρετήρια για πίνακα `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `id` (`id`);

--
-- AUTO_INCREMENT για άχρηστους πίνακες
--

--
-- AUTO_INCREMENT για πίνακα `devices`
--
ALTER TABLE `devices`
  MODIFY `device_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT για πίνακα `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
