<?php

class Loader
{
  /**
   * Метод сканирующий директорию. Предназначен для просмотра имеющихся файлов с отзывами
   * @param string $dir Искомая директория для сканирования
   * @param int $sortMode Режим сортировки при сканировании. 0 - обычный с разделителями директорий.
   *  1 - форсированный с удалением всех разделителей директорий
   * @return array $list Массив с именами всех файлов в искомой директории
   */
  public static function ScanDirectory($dir, $sortMode)
  {
    try {
      $list = scandir($dir, $sortMode);

      if (!$list) {
        throw new Exception("Директории не существует!");
      }

      if ($sortMode == 0) {
        unset($list[0], $list[1]);
      } elseif ($sortMode == 1) {
        unset($list[count($list) - 1], $list[count($list) - 1]);
      }

      return $list;
      
    } catch (Exception $ex) {
      echo $ex->getMessage();
    }
  }

  /**
   * Метод загружающий файл отзыва в папку хранения отзывов. Использует суперглобальный массив POST для проверки
   * события отправки файла
   * @param string $uploadPath Путь, по которому будет производиться загрузка файлов. Как правило является константой
   */
  public final static function UploadFile($uploadPath)
  {
    try {
      if (isset($_POST['file-sender'])) {

        $fileName = $_FILES['file-form']['name'];
        $fileTmpName = $_FILES['file-form']['tmp_name'];
        $fileSize = $_FILES['file-form']['size'];
        $errors = $_FILES['file-form']['error'];
        $fileExtension = strtolower(end(explode('.', $fileName)));
        $allowedExtensions = ['png', 'jpeg', 'jpg'];

        if (in_array($fileExtension, $allowedExtensions)) {
          if ($fileSize < 5000000) {
            if ($errors === 0) {
              move_uploaded_file($fileTmpName, $uploadPath . $fileName);
              return true;
            } else {
              throw new Exception('Произошла ошибка ' . $errors);
            }
          } else {
            throw new Exception("Размер файла более 5-ти мегабайт");
          }
        } else {
          throw new Exception("Недопустимое расширение файла. Загружать можно только картинки в формате png, jpeg и jpg");
        }
      }
    } catch (Exception $ex) {
      echo $ex->getMessage();
    }
  }

  public final static function RemoveFile(string $filePath, string $fileName)
  {
    try {
      if (is_string($filePath) && $filePath !== '') {
        if (is_string($fileName) && $fileName !== '') {
          if (file_exists($filePath . $fileName)) {
            unlink($filePath . $fileName);
          }
        } else {
          throw new Exception('Имя файла не может быть пустым!');
        }
      } else {
        throw new Exception('Путь к файлу не может быть пустым!');
      }
    } catch (Exception $ex) {
      return $ex->getMessage();
    }
  }
}
